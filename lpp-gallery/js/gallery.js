jQuery(document).ready(function($) {
    // Category filtering
    $('.category-item input[type="checkbox"]').on('change', function() {
        filterAndSortGallery();
    });

    // Sort functionality
    $('#sort-select').on('change', function() {
        filterAndSortGallery();
    });

    function filterAndSortGallery() {
        // Get selected categories
        const selectedCategories = $('.category-item input[type="checkbox"]:checked')
            .map(function() { return $(this).val(); })
            .get();

        // Get sort method
        const sortMethod = $('#sort-select').val();

        // Get all gallery items
        const $galleryItems = $('.gallery-item');

        // First, reset all items
        $galleryItems.hide();

        // Filter by category
        const $filteredItems = selectedCategories.length > 0 
            ? $galleryItems.filter(function() {
                return selectedCategories.includes($(this).data('category'));
            })
            : $galleryItems;

        // Sort items
        const $sortedItems = $filteredItems.sort(function(a, b) {
            const dateA = parseInt($(a).data('date'));
            const dateB = parseInt($(b).data('date'));
            
            return sortMethod === 'newest' 
                ? dateB - dateA 
                : dateA - dateB;
        });

        // Show all sorted items
        $sortedItems.show();

        // Update results count
        updateResultsCount($sortedItems.length);
    }

    function updateResultsCount(totalVisible) {
        const totalItems = $('.gallery-item').length;
        $('.results-count').text(`Showing 1-${totalVisible} of ${totalItems} results`);
    }

    // Initial load: sort by most recent
    filterAndSortGallery();
});
