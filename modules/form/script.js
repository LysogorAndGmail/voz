$(document).ready(function() {
    $('div.form').each(function() {
        if ($(this).attr('id') == 'search') return;
        $(this).find('table.grid').each(function() {
            if ($(this).hasClass('controls') == true) return;
            var elementsCount = 0;
            $(this).find('tbody > tr:first > td.element').each(function() {
                if ($(this).hasClass('type_link' ) == true) return;
                if ($(this).hasClass('type_image') == true) return;
                if ($(this).hasClass('change') == true) return;
                elementsCount ++;
            });
            var dividersSummaryWidth = 0;
            $(this).find('tbody > tr:first > td.divider').each(function() {
                dividersSummaryWidth += $(this).width();
            });
            $(this).find('tbody > tr:first > td.element.type_link').each(function() {
                dividersSummaryWidth += $(this).find('a:first').width();
            });
            var width = Math.floor(($(this).width() - dividersSummaryWidth) / elementsCount);
            $(this).find('tbody > tr:first > td.element').each(function() {
                if ($(this).hasClass('type_link') == true) return;
                if ($(this).index() == 0) return;
                $(this).width(width);
            });
        });
    });
});

function form_element_select_labelless_fix_textalign() {
    if ($(this).val() == '') {
        $(this).css('text-align', 'center');
    } else {
        $(this).css('text-align', 'left');
    }
}