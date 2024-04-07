/* Efecto de cargar datos */
function ajaxLoader(el, options) {
    // Becomes this.options
    var defaults = {
        bgColor: '#fff',
        duration: 800,
        opacity: 0.7,
        classOveride: false
    }
    this.options = jQuery.extend(defaults, options);
    this.container = $(el);

    this.init = function() {
        var container = this.container;
        // Delete any other loaders
        this.remove();
        // Create the overlay 
        var overlay = $('<div></div>').css({
            'background-color': this.options.bgColor,
            'opacity': this.options.opacity,
            'width': container.width(),
            'height': container.height(),
            'position': 'absolute',
            'top': '0px',
            'left': '0px',
            'z-index': 9999
        }).addClass('ajax_overlay');
        // add an overiding class name to set new loader style 
        if (this.options.classOveride) {
            overlay.addClass(this.options.classOveride);
        }
        // insert overlay and loader into DOM 
        container.append(
                overlay.append(
                        $('<div></div>').addClass('ajax_loader')
                        ).fadeIn(this.options.duration)
                );
        // $.scrollLock( true );
    };

    this.remove = function() {
        var overlay = this.container.children(".ajax_overlay");
        if (overlay.length) {
            overlay.fadeOut(this.options.classOveride, function() {
                overlay.remove();
            });
        }
        // $.scrollLock( false );	
    }

    this.init();
}

function ajaxLoader2(el, options) {
    // Becomes this.options
    var defaults = {
        bgColor: '#fff',
        duration: 800,
        opacity: 0.7,
        classOveride: false
    }
    this.options = jQuery.extend(defaults, options);
    this.container = $(el);

    this.init = function() {
        var container = this.container;
        // Delete any other loaders
        this.remove();
        // Create the overlay 
        var overlay = $('<div></div>').css({
            'background-color': this.options.bgColor,
            'opacity': this.options.opacity,
            'width': container.width(),
            'height': '100%',
            'position': 'absolute',
            'top': '0px',
            'left': '0px',
            'z-index': 9999
        }).addClass('ajax_overlay');
        // add an overiding class name to set new loader style 
        if (this.options.classOveride) {
            overlay.addClass(this.options.classOveride);
        }
        // insert overlay and loader into DOM 
        container.append(
                overlay.append(
                        $('<div></div>').addClass('ajax_loader')
                        ).fadeIn(this.options.duration)
                );
        // $.scrollLock( true );
    };

    this.remove = function() {
        var overlay = this.container.children(".ajax_overlay");
        if (overlay.length) {
            overlay.fadeOut(this.options.classOveride, function() {
                overlay.remove();
            });
        }
        // $.scrollLock( false );	
    }

    this.init();
}

function ropausual(skinid) {
    var efecto = new ajaxLoader('#EfectoAjax', {classOveride: 'blue-loader', bgColor: '#000'});
    document.getElementById('ropausual').value = skinid;
    document.forms['form-cropa'].submit();
}

function ropatrabajo(skinid) {
    var efecto = new ajaxLoader('#EfectoAjax', {classOveride: 'blue-loader', bgColor: '#000'});
    document.getElementById('ropatrabajo').value = skinid;
    document.forms['form-jobcropa'].submit();
}

function reiniciar_pos() {
    $('#posicion').val('1642.1908, -2334.3503, 13.5469, 358.0489');
    $('#interior').val('0');
    $('#virtualworld').val('0');
}
