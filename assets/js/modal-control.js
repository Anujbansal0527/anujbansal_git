// MDB exposes a native Modal API even when the jQuery modal plugin is unavailable.
window.rvSetModal = function (selector, action) {
    document.querySelectorAll(selector).forEach(function (element) {
        if (window.mdb && window.mdb.Modal) {
            var Modal = window.mdb.Modal;
            var instance = Modal.getInstance(element) || new Modal(element);
            instance[action]();
        } else if (window.jQuery && typeof window.jQuery.fn.modal === 'function') {
            window.jQuery(element).modal(action);
        }
    });
};
