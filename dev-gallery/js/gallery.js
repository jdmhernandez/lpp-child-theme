jQuery(document).ready(function($) {
    // store initial gallery state
    const galleryState = {
        filters: [],
        sortBy: 'newest',
        totalImages: 0,
        visibleImages: 0
    };

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
