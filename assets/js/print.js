// var doc = new jsPDF();
// var specialElementHandlers = {
//     '#cetb': function (element, renderer) {
//         return true;
//     }
// };
//
// $('#printz').click(function () {
//     doc.fromHTML($('#cetk').html(), 15, 15, {
//         'width': 170,
//             'elementHandlers': specialElementHandlers
//     });
//     doc.save('sample-file.pdf');
// });

function demoFromHTML() {
    var pdf = new jsPDF('p', 'pt', 'letter');

    source = $('#cetk')[0];
    specialElementHandlers = {
        '#bypassme': function (element, renderer) {
            return true
        }
    };
    margins = {
        top: 80,
        bottom: 60,
        left: 40,
        width: 522
    };
    pdf.fromHTML(
    source, // HTML string or DOM elem ref.
    margins.left, // x coord
    margins.top, { // y coord
        'width': margins.width, // max width of content on PDF
        'elementHandlers': specialElementHandlers
    },

    function (dispose) {
        pdf.save('Test.pdf');
    }, margins);
}
