$(function () {
    setInterval("slideSwitch()", 7200);
});

//accordion, tabs, date picker
$(function () {
    var icons = {
        header: "ui-icon-circle-arrow-e",
        headerSelected: "ui-icon-circle-arrow-s"
    };
    $("#cypher-vmenu").accordion({
        icons: icons,
        autoheight: false,
        navigation: true
    });

    $("#cypher-tabs").tabs();

});

//data table
$(function () {
    oTable = $('#cypher-dataTable').dataTable({
        "bJQueryUI": true,
        "sPaginationType": "full_numbers"
    });
});

