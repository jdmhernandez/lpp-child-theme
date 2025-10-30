jQuery(document).ready(function($) {
    // store initial gallery state
    const galleryState = {
        filters: [],
        sortBy: 'newest',
        totalImages: 0,
        visibleImages: 0,
        selectedImages: []
    };

    // Handle select all checkbox
    $('#select-all-images').on('change', function() {
        const isChecked = $(this).prop('checked');
        $('.image-checkbox').prop('checked', isChecked);
        updateDeleteButton();
    });

    // Handle individual image checkboxes
    $('.image-checkbox').on('change', function() {
        updateDeleteButton();
        
        // Uncheck "select all" if any image is unchecked
        if (!$(this).prop('checked')) {
            $('#select-all-images').prop('checked', false);
        }
        
        // Check "select all" if all images are checked
        if ($('.image-checkbox:checked').length === $('.image-checkbox').length) {
            $('#select-all-images').prop('checked', true);
        }
    });

    // Update delete button state
    function updateDeleteButton() {
        const selectedCount = $('.image-checkbox:checked').length;
        const $deleteButton = $('#delete-selected');
        
        $deleteButton.prop('disabled', selectedCount === 0);
        $deleteButton.text(selectedCount === 0 ? 'Delete Selected' : `Delete Selected (${selectedCount})`);
    }

    // Handle delete button click
    $('#delete-selected').on('click', function() {
        const selectedImages = $('.image-checkbox:checked').map(function() {
            return $(this).data('image-id');
        }).get();

        if (selectedImages.length === 0) return;

        if (!confirm(`Are you sure you want to delete ${selectedImages.length} image${selectedImages.length > 1 ? 's' : ''}?`)) {
            return;
        }

        // Disable delete button during processing
        $(this).prop('disabled', true).text('Deleting...');

        // Send delete request
        $.ajax({
            url: galleryAjax.url,
            type: 'POST',
            data: {
                action: 'delete_gallery_images',
                nonce: galleryAjax.nonce,
                image_ids: selectedImages
            },
            success: function(response) {
                if (response.success) {
                    // Remove deleted images from DOM
                    response.data.deleted.forEach(function(imageId) {
                        $(`.image-checkbox[data-image-id="${imageId}"]`).closest('.gallery-item').fadeOut(300, function() {
                            $(this).remove();
                        });
                    });
                    
                    alert(response.data.message);
                    
                    // Reset select all checkbox
                    $('#select-all-images').prop('checked', false);
                    updateDeleteButton();
                } else {
                    alert('Error: ' + response.data);
                }
            },
            error: function() {
                alert('Error processing request. Please try again.');
            },
            complete: function() {
                // Re-enable delete button
                updateDeleteButton();
            }
        });
    });

    // initialize filters from checked boxes
    function initializeFilters() {
        $('.gallery-filter input:checked').each(function() {
            galleryState.filters.push($(this).val());
        });
        updateGallery();
    }

    // toggle filter dropdown
    $('.filter-header').click(function() {
        $(this).find('.chevron').toggleClass('rotated');
        $('.filter-options').slideToggle(200);
    });

    // toggle sort dropdown
    $('.sort-header').click(function() {
        $(this).find('.chevron').toggleClass('rotated');
        $('.sort-options').slideToggle(200);
    });

    // handle filter changes
    $('.gallery-filter input').change(function() {
        const category = $(this).val();
        if ($(this).is(':checked')) {
            galleryState.filters.push(category);
        } else {
            galleryState.filters = galleryState.filters.filter(f => f !== category);
        }
        updateGallery();
    });

    // handle sort changes
    $('.sort-by input').change(function() {
        galleryState.sortBy = $(this).val();
        updateGallery();
    });

    // update gallery display
    function updateGallery() {
        const $items = $('.gallery-item');
        let visibleCount = 0;
        
        $items.each(function() {
            const $item = $(this);
            const category = $item.data('category') || '';
            const timestamp = $item.data('timestamp');
            
            // show all if no filters selected
            const showItem = galleryState.filters.length === 0 || 
                           galleryState.filters.includes(category);
            
            if (showItem) {
                $item.show();
                visibleCount++;
            } else {
                $item.hide();
            }
        });

        // update sort order
        const $gallery = $('.gallery-grid');
        const $itemsArray = $gallery.children('.gallery-item:visible').get();
        
        $itemsArray.sort(function(a, b) {
            const timeA = $(a).data('timestamp');
            const timeB = $(b).data('timestamp');
            return galleryState.sortBy === 'newest' ? timeB - timeA : timeA - timeB;
        });
        
        $.each($itemsArray, function(i, item) {
            $gallery.append(item);
        });

        // update results counter
        galleryState.visibleImages = visibleCount;
        galleryState.totalImages = $items.length;
        
        $('.results-counter').text(
            `Showing ${visibleCount} of ${$items.length} results`
        );
    }

    // initialize gallery
    initializeFilters();
});
