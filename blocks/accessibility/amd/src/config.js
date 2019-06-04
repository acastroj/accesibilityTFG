define([], function () {
    window.requirejs.config({
        paths: {
            "spectrum": M.cfg.wwwroot + '/blocks/accessibility/colourpicker/spectrum'
        },
        shim: {
            'spectrum': {exports: 'spectrum'},
        }
    });
});