const { jsPDF } = window.jspdf;


function generatePDF() {
    const element = document.body;

    // Use html2pdf library
    html2pdf(element)
        .from(element)
        .set({
            margin: 15,
            filename: 'syllabus.pdf',
            image: { type: 'jpeg', quality: 0.98 },
            html2canvas: { scale: 2 },
            jsPDF: { unit: 'mm', format: 'a4', orientation: 'portrait' }
        })
        .outputPdf();
}

// Trigger the PDF generation when the document is ready
$(document).ready(function () {
    generatePDF();
});