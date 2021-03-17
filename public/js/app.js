/*
Template Name: Zircos - Responsive Bootstrap 4 Admin Dashboard
Author: CoderThemes
Version: 3.0.0
Website: https://coderthemes.com/
Contact: support@coderthemes.com
File: Main Js File
*/


!function ($) {
    "use strict";

    var Components = function () { };

    //initializing tooltip
    Components.prototype.initTooltipPlugin = function () {
        $.fn.tooltip && $('[data-toggle="tooltip"]').tooltip()
    },

    //initializing popover
    Components.prototype.initPopoverPlugin = function () {
        $.fn.popover && $('[data-toggle="popover"]').popover()
    },

    //initializing Slimscroll
    Components.prototype.initSlimScrollPlugin = function () {
        //You can change the color of scroll bar here
        $.fn.slimScroll && $(".slimscroll").slimScroll({
            height: 'auto',
            position: 'right',
            size: "5px",
            touchScrollStep: 20,
            color: '#9ea5ab'
        });
    },

    //initializing custom modal
    Components.prototype.initCustomModalPlugin = function() {
        $('[data-plugin="custommodal"]').on('click', function(e) {
            e.preventDefault();
            var modal = new Custombox.modal({
                content: {
                    target: $(this).attr("href"),
                    effect: $(this).attr("data-animation")
                },
                overlay: {
                    color: $(this).attr("data-overlayColor")
                }
            });
            // Open
            modal.open();
        });
    },

    // Counterup
    Components.prototype.initCounterUp = function() {
        var delay = $(this).attr('data-delay')?$(this).attr('data-delay'):100; //default is 100
        var time = $(this).attr('data-time')?$(this).attr('data-time'):1200; //default is 1200
         $('[data-plugin="counterup"]').each(function(idx, obj) {
            $(this).counterUp({
                delay: 100,
                time: 1200
            });
         });
    },

    //peity charts
    Components.prototype.initPeityCharts = function() {
        $('[data-plugin="peity-pie"]').each(function(idx, obj) {
            var colors = $(this).attr('data-colors')?$(this).attr('data-colors').split(","):[];
            var width = $(this).attr('data-width')?$(this).attr('data-width'):20; //default is 20
            var height = $(this).attr('data-height')?$(this).attr('data-height'):20; //default is 20
            $(this).peity("pie", {
                fill: colors,
                width: width,
                height: height
            });
        });
        //donut
         $('[data-plugin="peity-donut"]').each(function(idx, obj) {
            var colors = $(this).attr('data-colors')?$(this).attr('data-colors').split(","):[];
            var width = $(this).attr('data-width')?$(this).attr('data-width'):20; //default is 20
            var height = $(this).attr('data-height')?$(this).attr('data-height'):20; //default is 20
            $(this).peity("donut", {
                fill: colors,
                width: width,
                height: height
            });
        });

        $('[data-plugin="peity-donut-alt"]').each(function(idx, obj) {
            $(this).peity("donut");
        });

        // line
        $('[data-plugin="peity-line"]').each(function(idx, obj) {
            $(this).peity("line", $(this).data());
        });

        // bar
        $('[data-plugin="peity-bar"]').each(function(idx, obj) {
            var colors = $(this).attr('data-colors')?$(this).attr('data-colors').split(","):[];
            var width = $(this).attr('data-width')?$(this).attr('data-width'):20; //default is 20
            var height = $(this).attr('data-height')?$(this).attr('data-height'):20; //default is 20
            $(this).peity("bar", {
                fill: colors,
                width: width,
                height: height
            });
         });
    },

    Components.prototype.initKnob = function() {
        $('[data-plugin="knob"]').each(function(idx, obj) {
           $(this).knob();
        });
    },

    //initilizing
    Components.prototype.init = function () {
        var $this = this;
        this.initTooltipPlugin(),
        this.initPopoverPlugin(),
        this.initSlimScrollPlugin(),
        this.initCustomModalPlugin(),
        this.initCounterUp(),
        this.initPeityCharts(),
        this.initKnob();
    },

    $.Components = new Components, $.Components.Constructor = Components

}(window.jQuery),

function ($) {
    "use strict";

    var RightSidebar = function () {
        this.$bootstrapStylesheet = $('#bootstrap-stylesheet'),
        this.$appStylesheet = $('#app-stylesheet'),
        this.$originalBSStylesheet = $('#bootstrap-stylesheet').attr('href'),
        this.$originalAppStylesheet = $('#app-stylesheet').attr('href');
    };

    RightSidebar.prototype.init = function() {
        var self = this;

        $("#light-mode-switch").on('change', function() {
            if (this.checked) {
                self.$bootstrapStylesheet.attr('href', self.$originalBSStylesheet);
                self.$appStylesheet.attr('href', self.$originalAppStylesheet);

                $("#dark-mode-switch").prop('checked', false);
                $("#rtl-mode-switch").prop('checked', false);
                $("#dark-rtl-mode-switch").prop('checked', false);
            }
        });

        $("#dark-mode-switch").on('change', function() {
            if (this.checked) {
                self.$bootstrapStylesheet.attr('href', $(this).data('bsstyle'));
                self.$appStylesheet.attr('href',  $(this).data('appstyle'));

                $("#light-mode-switch").prop('checked', false);
                $("#rtl-mode-switch").prop('checked', false);
                $("#dark-rtl-mode-switch").prop('checked', false);
            }
        });

        $("#rtl-mode-switch").on('change', function() {
            if (this.checked) {
                self.$bootstrapStylesheet.attr('href', self.$originalBSStylesheet);
                self.$appStylesheet.attr('href',  $(this).data('appstyle'));

                $("#light-mode-switch").prop('checked', false);
                $("#dark-mode-switch").prop('checked', false);
                $("#dark-rtl-mode-switch").prop('checked', false);
            }
        });

        $("#dark-rtl-mode-switch").on('change', function() {
            if (this.checked) {
                self.$bootstrapStylesheet.attr('href', $(this).data('bsstyle'));
                self.$appStylesheet.attr('href',  $(this).data('appstyle'));

                $("#light-mode-switch").prop('checked', false);
                $("#rtl-mode-switch").prop('checked', false);
                $("#dark-mode-switch").prop('checked', false);
            }
        });
    },

    $.RightSidebar = new RightSidebar, $.RightSidebar.Constructor = RightSidebar

}(window.jQuery),



function($) {
    "use strict";

    /**
    Portlet Widget
    */
    var Portlet = function() {
        this.$body = $("body"),
        this.$portletIdentifier = ".card",
        this.$portletCloser = '.card a[data-toggle="remove"]',
        this.$portletRefresher = '.card a[data-toggle="reload"]'
    };

    //on init
    Portlet.prototype.init = function() {
        // Panel closest
        var $this = this;
        $(document).on("click",this.$portletCloser, function (ev) {
            ev.preventDefault();
            var $portlet = $(this).closest($this.$portletIdentifier);
                var $portlet_parent = $portlet.parent();
            $portlet.remove();
            if ($portlet_parent.children().length == 0) {
                $portlet_parent.remove();
            }
        });

        // Panel Reload
        $(document).on("click",this.$portletRefresher, function (ev) {
            ev.preventDefault();
            var $portlet = $(this).closest($this.$portletIdentifier);
            // This is just a simulation, nothing is going to be reloaded
            $portlet.append('<div class="card-disabled"><div class="card-portlets-loader"><div class="double-bounce1"></div><div class="double-bounce2"></div></div></div>');
            var $pd = $portlet.find('.card-disabled');
            setTimeout(function () {
                $pd.fadeOut('fast', function () {
                    $pd.remove();
                });
            }, 500 + 300 * (Math.random() * 5));
        });
    },
    //
    $.Portlet = new Portlet, $.Portlet.Constructor = Portlet

}(window.jQuery),

function ($) {
    'use strict';

    var App = function () {
        this.$body = $('body'),
        this.$window = $(window)
    };

    /**
    Resets the scroll
    */
    App.prototype._resetSidebarScroll = function () {
        // sidebar - scroll container
        $('.slimscroll-menu').slimscroll({
            height: 'auto',
            position: 'right',
            size: "5px",
            color: '#9ea5ab',
            wheelStep: 5,
            touchScrollStep: 20
        });
    },

    /**
     * Initlizes the menu - top and sidebar
    */
    App.prototype.initMenu = function () {
        var $this = this;

        // Left menu collapse
        $('.button-menu-mobile').on('click', function (event) {
            event.preventDefault();
            $this.$body.toggleClass('sidebar-enable');
            if ($this.$window.width() >= 768) {
                $this.$body.toggleClass('enlarged');
            } else {
                $this.$body.removeClass('enlarged');
            }

            // sidebar - scroll container
            $this._resetSidebarScroll();
        });

        // sidebar - main menu
        $("#side-menu").metisMenu();

        // sidebar - scroll container
        $this._resetSidebarScroll();

        // right side-bar toggle
        $('.right-bar-toggle').on('click', function (e) {
            $('body').toggleClass('right-bar-enabled');
        });

        $(document).on('click', 'body', function (e) {
            if ($(e.target).closest('.right-bar-toggle, .right-bar').length > 0) {
                return;
            }

            if ($(e.target).closest('.left-side-menu, .side-nav').length > 0 || $(e.target).hasClass('button-menu-mobile')
                || $(e.target).closest('.button-menu-mobile').length > 0) {
                return;
            }

            $('body').removeClass('right-bar-enabled');
            $('body').removeClass('sidebar-enable');
            return;
        });

        // activate the menu in left side bar based on url
        $("#side-menu a").each(function () {
            var pageUrl = window.location.href.split(/[?#]/)[0];
            if (this.href == pageUrl) {
                $(this).addClass("active");
                $(this).parent().addClass("mm-active"); // add active to li of the current link
                $(this).parent().parent().addClass("mm-show");
                $(this).parent().parent().prev().addClass("active"); // add active class to an anchor
                $(this).parent().parent().parent().addClass("mm-active");
                $(this).parent().parent().parent().parent().addClass("mm-show"); // add active to li of the current link
                $(this).parent().parent().parent().parent().parent().addClass("mm-active");
            }
        });

        // activate the menu in horizontal menu based on url
        $(".navigation-menu a").each(function () {
            var pageUrl = window.location.href.split(/[?#]/)[0];
            if (this.href == pageUrl) {
                $(this).addClass("active");
                $(this).parent().addClass("active"); // add active to li of the current link
                $(this).parent().parent().addClass("in");
                $(this).parent().parent().prev().addClass("active"); // add active class to an anchor
                $(this).parent().parent().parent().addClass("active");
                $(this).parent().parent().parent().parent().addClass("in"); // add active to li of the current link
                $(this).parent().parent().parent().parent().parent().addClass("active");
            }
        });

        // Topbar - main menu
        $('.navbar-toggle').on('click', function (event) {
            $(this).toggleClass('open');
            $('#navigation').slideToggle(400);
        });

        $('.navigation-menu>li').slice(-2).addClass('last-elements');

        $('.navigation-menu li.has-submenu a[href="#"]').on('click', function (e) {
            if ($(window).width() < 992) {
                e.preventDefault();
                $(this).parent('li').toggleClass('open').find('.submenu:first').toggleClass('open');
            }
        });

    },

    /**
     * Init the layout - with broad sidebar or compact side bar
    */
    App.prototype.initLayout = function () {
        // in case of small size, add class enlarge to have minimal menu
        if (this.$window.width() >= 768 && this.$window.width() <= 1024) {
            this.$body.addClass('enlarged');
        } else {
            if (this.$body.data('keep-enlarged') != true) {
                this.$body.removeClass('enlarged');
            }
        }
    },

    //initilizing
    App.prototype.init = function () {
        var $this = this;
        this.initLayout();
        $.Portlet.init();
        this.initMenu();
        $.Components.init();

        // right sidebar
        $.RightSidebar.init();

        // on window resize, make menu flipped automatically
        $this.$window.on('resize', function (e) {
            e.preventDefault();
            $this.initLayout();
            $this._resetSidebarScroll();
        });
    },

    $.App = new App, $.App.Constructor = App


}(window.jQuery),
//initializing main application module
function ($) {
    "use strict";
    $.App.init();
}(window.jQuery);

// Waves Effect
Waves.init();


// Graph

window.onload = function () {

var chart = new CanvasJS.Chart("chartContainerstack", {
	animationEnabled: true,
	title:{
		text: ""
	},
	axisX: {
		interval: 1,
		intervalType: "year",
		valueFormatString: "YYYY"
	},
	axisY: {
		suffix: "%"
	},
	toolTip: {
		shared: true
	},
	legend: {
		reversed: true,
		verticalAlign: "center",
		horizontalAlign: "right"
	},
	data: [{
		type: "stackedColumn100",
		name: "Real-Time",
		showInLegend: true,
		xValueFormatString: "YYYY",
		yValueFormatString: "#,##0'%'",
		dataPoints: [
			{ x: new Date(2010,0), y: 40 },
			{ x: new Date(2011,0), y: 50 },
			{ x: new Date(2012,0), y: 60 },
			{ x: new Date(2013,0), y: 61 },
			{ x: new Date(2014,0), y: 63 },
			{ x: new Date(2015,0), y: 65 },
			{ x: new Date(2016,0), y: 67 }
		]
	},
	{
		type: "stackedColumn100",
		name: "Web Browsing",
		showInLegend: true,
		xValueFormatString: "YYYY",
		yValueFormatString: "#,##0'%'",
		dataPoints: [
			{ x: new Date(2010,0), y: 28 },
			{ x: new Date(2011,0), y: 18 },
			{ x: new Date(2012,0), y: 12 },
			{ x: new Date(2013,0), y: 10 },
			{ x: new Date(2014,0), y: 10 },
			{ x: new Date(2015,0), y: 7 },
			{ x: new Date(2016,0), y: 5 }
		]
	},
	{
		type: "stackedColumn100",
		name: "File Sharing",
		showInLegend: true,
		xValueFormatString: "YYYY",
		yValueFormatString: "#,##0'%'",
		dataPoints: [
			{ x: new Date(2010,0), y: 15 },
			{ x: new Date(2011,0), y: 12 },
			{ x: new Date(2012,0), y: 10 },
			{ x: new Date(2013,0), y: 9 },
			{ x: new Date(2014,0), y: 7 },
			{ x: new Date(2015,0), y: 5 },
			{ x: new Date(2016,0), y: 1 }
		]
	},
	{
		type: "stackedColumn100",
		name: "Others",
		showInLegend: true,
		xValueFormatString: "YYYY",
		yValueFormatString: "#,##0'%'",
		dataPoints: [
			{ x: new Date(2010,0), y: 17 },
			{ x: new Date(2011,0), y: 20 },
			{ x: new Date(2012,0), y: 18 },
			{ x: new Date(2013,0), y: 20 },
			{ x: new Date(2014,0), y: 20 },
			{ x: new Date(2015,0), y: 23 },
			{ x: new Date(2016,0), y: 27 }
		]
	}]
});
}
window.onload = function () {

var chart = new CanvasJS.Chart("chartContainer", {
	exportEnabled: true,
	animationEnabled: true,
	title:{
		text: ""
	},
	legend:{
		cursor: "pointer",
		itemclick: explodePie
	},
	data: [{
		type: "pie",
		showInLegend: true,
		toolTipContent: "{name}: <strong>{y}%</strong>",
		indexLabel: "{name} - {y}%",
		dataPoints: [
			{ y: 26, name: "project 1", exploded: true },
			{ y: 20, name: "project 2" },
			{ y: 5, name: "project 3" },
			{ y: 3, name: "project 4" },
			{ y: 7, name: "project 5" },
			{ y: 17, name: "project 6" },
			{ y: 22, name: "project 7"}
		]
	}]
});
chart.render();
}
function explodePie (e) {
	if(typeof (e.dataSeries.dataPoints[e.dataPointIndex].exploded) === "undefined" || !e.dataSeries.dataPoints[e.dataPointIndex].exploded) {
		e.dataSeries.dataPoints[e.dataPointIndex].exploded = true;
	} else {
		e.dataSeries.dataPoints[e.dataPointIndex].exploded = false;
	}
	e.chart.render();

}


window.onload = function () {

    var chart = new CanvasJS.Chart("chartContainerstack", {
        animationEnabled: true,
        title:{
            text: ""
        },
        axisX: {
            interval: 1,
            intervalType: "year",
            valueFormatString: "YYYY"
        },
        axisY: {
            suffix: "%"
        },
        toolTip: {
            shared: true
        },
        legend: {
            reversed: true,
            verticalAlign: "center",
            horizontalAlign: "right"
        },
        data: [{
            type: "stackedColumn100",
            name: "Real-Time",
            showInLegend: true,
            xValueFormatString: "YYYY",
            yValueFormatString: "#,##0'%'",
            dataPoints: [
                { x: new Date(2010,0), y: 40 },
                { x: new Date(2011,0), y: 50 },
                { x: new Date(2012,0), y: 60 },
                { x: new Date(2013,0), y: 61 },
                { x: new Date(2014,0), y: 63 },
                { x: new Date(2015,0), y: 65 },
                { x: new Date(2016,0), y: 67 }
            ]
        },
            {
                type: "stackedColumn100",
                name: "Web Browsing",
                showInLegend: true,
                xValueFormatString: "YYYY",
                yValueFormatString: "#,##0'%'",
                dataPoints: [
                    { x: new Date(2010,0), y: 28 },
                    { x: new Date(2011,0), y: 18 },
                    { x: new Date(2012,0), y: 12 },
                    { x: new Date(2013,0), y: 10 },
                    { x: new Date(2014,0), y: 10 },
                    { x: new Date(2015,0), y: 7 },
                    { x: new Date(2016,0), y: 5 }
                ]
            },
            {
                type: "stackedColumn100",
                name: "File Sharing",
                showInLegend: true,
                xValueFormatString: "YYYY",
                yValueFormatString: "#,##0'%'",
                dataPoints: [
                    { x: new Date(2010,0), y: 15 },
                    { x: new Date(2011,0), y: 12 },
                    { x: new Date(2012,0), y: 10 },
                    { x: new Date(2013,0), y: 9 },
                    { x: new Date(2014,0), y: 7 },
                    { x: new Date(2015,0), y: 5 },
                    { x: new Date(2016,0), y: 1 }
                ]
            },
            {
                type: "stackedColumn100",
                name: "Others",
                showInLegend: true,
                xValueFormatString: "YYYY",
                yValueFormatString: "#,##0'%'",
                dataPoints: [
                    { x: new Date(2010,0), y: 17 },
                    { x: new Date(2011,0), y: 20 },
                    { x: new Date(2012,0), y: 18 },
                    { x: new Date(2013,0), y: 20 },
                    { x: new Date(2014,0), y: 20 },
                    { x: new Date(2015,0), y: 23 },
                    { x: new Date(2016,0), y: 27 }
                ]
            }]
    });
}
window.onload = function () {

    var chart = new CanvasJS.Chart("chartContainer", {
        exportEnabled: true,
        animationEnabled: true,
        title:{
            text: ""
        },
        legend:{
            cursor: "pointer",
            itemclick: explodePie
        },
        data: [{
            type: "pie",
            showInLegend: true,
            toolTipContent: "{name}: <strong>{y}%</strong>",
            indexLabel: "{name} - {y}%",
            dataPoints: [
                { y: 26, name: "new leads", exploded: true },
                { y: 20, name: "low budget" },
                { y: 5, name: "follow up" },
                { y: 3, name: "meeting" },
                { y: 7, name: "no answer" },
                { y: 17, name: "interst" },
                { y: 22, name: "not interest"}
            ]
        }]
    });
    chart.render();
}

function explodePie (e) {
    if(typeof (e.dataSeries.dataPoints[e.dataPointIndex].exploded) === "undefined" || !e.dataSeries.dataPoints[e.dataPointIndex].exploded) {
        e.dataSeries.dataPoints[e.dataPointIndex].exploded = true;
    } else {
        e.dataSeries.dataPoints[e.dataPointIndex].exploded = false;
    }
    e.chart.render();

}


