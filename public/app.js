/*! DataTables Tailwind CSS integration (Improved) */

(function(factory) {
    if (typeof define === 'function' && define.amd) {
      // AMD
      define(['jquery', 'datatables.net'], function($) {
        return factory($, window, document);
      });
    } else if (typeof exports === 'object') {
      // CommonJS
      var jq = require('jquery');
      var cjsRequires = function(root, $) {
        if (!$.fn.dataTable) {
          require('datatables.net')(root, $);
        }
      };
  
      if (typeof window === 'undefined') {
        module.exports = function(root, $) {
          if (!root) {
            // CommonJS environments without a window global must pass a root. This will give an error otherwise
            root = window;
          }
  
          if (!$) {
            $ = jq(root);
          }
  
          cjsRequires(root, $);
          return factory($, root, root.document);
        };
      } else {
        cjsRequires(window, jq);
        module.exports = factory(jq, window, window.document);
      }
    } else {
      // Browser
      factory(jQuery, window, document);
    }
  })(function($, window, document) {
    'use strict';
    var DataTable = $.fn.dataTable;
  
    // Set the defaults for DataTables initialization
    $.extend(true, DataTable.defaults, {
      renderer: 'tailwindcss'
    });
  
    // Default class modification
    $.extend(true, DataTable.ext.classes, {
      container: 'dt-container dt-tailwindcss',
      search: {
        input: 'border placeholder-gray-500 ml-2 px-3 py-2 rounded-lg border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50'
      },
      length: {
        select: 'border px-3 py-2 rounded-lg border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50'
      },
      processing: {
        container: 'dt-processing'
      },
      paging: {
        active: 'font-semibold bg-gray-400',
        notActive: 'bg-gray-200',
        button: 'relative inline-flex justify-center items-center space-x-2 border px-4 py-2 leading-6 hover:bg-gray-600 hover:text-white focus:ring-2 focus:ring-gray-800 focus:ring-opacity-50',
        first: 'rounded-l-lg',
        last: 'rounded-r-lg',
        enabled: 'text-gray-800 hover:border-gray-300 hover:shadow-sm',
        notEnabled: 'text-gray-400'
      },
      table: 'dataTable min-w-full text-sm align-middle whitespace-nowrap bg-white shadow-sm rounded-lg',
      thead: {
        row: 'border-b border-gray-300',
        cell: 'px-4 py-3 text-gray-800 bg-gray-300 font-semibold text-left'
      },
      tbody: {
        row: 'odd:bg-white even:bg-gray-200',
        cell: 'px-4 py-2 text-gray-700'
      },
      tfoot: {
        row: 'bg-gray-50',
        cell: 'px-4 py-2 text-left'
      }
    });
  
    DataTable.ext.renderer.pagingButton.tailwindcss = function(settings, buttonType, content, active, disabled) {
      var classes = settings.oClasses.paging;
      var btnClasses = [classes.button];
  
      btnClasses.push(active ? classes.active : classes.notActive);
      btnClasses.push(disabled ? classes.notEnabled : classes.enabled);
  
      var a = $('<a>', {
        'href': disabled ? null : '#',
        'class': btnClasses.join(' ')
      }).html(content);
  
      return {
        display: a,
        clicker: a
      };
    };
  
    DataTable.ext.renderer.pagingContainer.tailwindcss = function(settings, buttonEls) {
      var classes = settings.oClasses.paging;
  
      buttonEls[0].addClass(classes.first);
      buttonEls[buttonEls.length - 1].addClass(classes.last);
  
      return $('<ul/>').addClass('pagination flex items-center space-x-2').append(buttonEls);
    };
  
    DataTable.ext.renderer.layout.tailwindcss = function(settings, container, items) {
      var row = $('<div/>', {
        class: items.full ? 'grid grid-cols-1 gap-4 mb-4' : 'grid grid-cols-2 gap-4 mb-4'
      }).appendTo(container);
  
      $.each(items, function(key, val) {
        var klass;
  
        if (val.table) {
          klass = 'col-span-2';
        } else if (key === 'start') {
          klass = 'justify-self-start';
        } else if (key === 'end') {
          klass = 'col-start-2 justify-self-end';
        } else {
          klass = 'col-span-2 justify-self-center';
        }
  
        $('<div/>', {
          id: val.id || null,
          class: klass + ' ' + (val.className || '')
        }).append(val.contents).appendTo(row);
      });
    };
  
    return DataTable;
  });
  