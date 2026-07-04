// ══════════════════════════════════════════════
//  Live table search (client-side, no reload)
//  Works on any table with class "dept-table".
//  Usage: place an <x-search-box> before the table.
// ══════════════════════════════════════════════
(function () {
    function initSearch(box) {
        var input = box.querySelector('.table-search-input');
        var emptyMsg = box.querySelector('.table-search-empty');
        var targetClass = box.getAttribute('data-search-target') || 'dept-table';

        // Find the nearest table with the target class (search within the same page section)
        var table = document.querySelector('.' + targetClass);
        if (!input || !table) return;

        var tbody = table.querySelector('tbody');
        if (!tbody) return;

        input.addEventListener('input', function () {
            var term = input.value.trim().toLowerCase();
            var rows = tbody.querySelectorAll('tr');
            var visibleCount = 0;

            rows.forEach(function (row) {
                var text = row.textContent.toLowerCase();
                var match = term === '' || text.indexOf(term) !== -1;
                row.style.display = match ? '' : 'none';
                if (match) visibleCount++;
            });

            if (emptyMsg) {
                emptyMsg.style.display = (visibleCount === 0 && term !== '') ? 'block' : 'none';
            }
        });
    }

    document.addEventListener('DOMContentLoaded', function () {
        document.querySelectorAll('.table-search').forEach(initSearch);
    });
})();