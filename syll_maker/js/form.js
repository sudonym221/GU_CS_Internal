
document.getElementById('submit').addEventListener('click', function () {
     // Get form data
    const courseCode = document.getElementById('course-code').value;
    const courseName = document.getElementById('course-name').value;
    const courseType = document.getElementById('course-type').value;
    const courseCredit = document.getElementById('course-credit').value;
    const courseLTP = document.getElementById('course-ltp').value;
    const courseContactHour = document.getElementById('course-contact-hour').value;
    const courseNonContactHour = document.getElementById('course-non-contact-hour').value;
    const courseTotalMarks = document.getElementById('course-total-marks').value;
    const courseNature = document.getElementById('course-nature').value;
    const semsterName = document.getElementById('semester-name').value;
    const courseDescription = document.getElementById('course-description').value;
    let objList = document.getElementById('objective-list').children
    let prereqList = document.getElementById('prereq-list').children
    let outcomeList = document.getElementById('outcome-list').children
    var tableRows = document.getElementById('content-table').querySelector('tbody').querySelectorAll('tr')
    let internalAss = document.getElementById('internal-assessment')
    let externalAss = document.getElementById('external-assessment')
    let readingTableRow = document.getElementById('recommended-reading-table').querySelector('tbody').querySelectorAll('tr')
    let assessmentCriteriaList = document.getElementById('assessment-criteria-list').children



    // Open new pdf window
    let pdfWindow = window.open('form1.html', '_blank')
    pdfWindow.onload = function () {

        let pdfTable = pdfWindow.document.getElementById('contentTable').querySelector('tbody')
        let pdfReadinglist = pdfWindow.document.getElementById('reading-list')

        pdfWindow.document.getElementById('course-code').innerText = courseCode;
        pdfWindow.document.getElementById('course-name').innerText = courseName;
        pdfWindow.document.getElementById('course-type').innerText = courseType;
        pdfWindow.document.getElementById('course-credit').innerText = courseCredit;
        pdfWindow.document.getElementById('course-ltp').innerText = courseLTP;
        pdfWindow.document.getElementById('course-contact-hour').innerText = courseContactHour;
        pdfWindow.document.getElementById('course-non-contact-hour').innerText = courseNonContactHour;
        pdfWindow.document.getElementById('course-total-marks').innerText = courseTotalMarks;
        pdfWindow.document.getElementById('course-nature').innerText = courseNature;
        pdfWindow.document.getElementById('semester-name').innerText = semsterName;
        pdfWindow.document.getElementById('course-description').innerText = courseDescription;



        if (assessmentCriteriaList) {
            let pdfAssList = pdfWindow.document.getElementById('assessment-criteria-list')
            for (let item of assessmentCriteriaList) {
               if(item.querySelector('textarea').value != '') { 
                let li = pdfWindow.document.createElement('li')
                let textNode = pdfWindow.document.createTextNode(item.querySelector('textarea').value)
                li.appendChild(textNode)
                pdfAssList.appendChild(li)}

            }
        }


        if (objList) {
            let pdfObjList = pdfWindow.document.getElementById('objective-list')
            for (let item of objList) {
               if(item.querySelector('textarea').value != '') { 
                let li = pdfWindow.document.createElement('li')
                let textNode = pdfWindow.document.createTextNode(item.querySelector('textarea').value)
                li.appendChild(textNode)
                pdfObjList.appendChild(li)}

            }
        }

        if(prereqList){
            let pdfPreList = pdfWindow.document.getElementById('prereq-list')
            for (let item of prereqList) {
                if(item.querySelector('textarea').value != '')
                {let li = pdfWindow.document.createElement('li')
                let textNode = pdfWindow.document.createTextNode(item.querySelector('textarea').value)
                li.appendChild(textNode)
                pdfPreList.appendChild(li)}

            }
        }

        if(outcomeList){
            let pdfOutcomeList = pdfWindow.document.getElementById('outcome-list')
            for (let item of outcomeList) {
                if(item.querySelector('textarea').value != '')
                {let li = pdfWindow.document.createElement('li')
                let textNode = pdfWindow.document.createTextNode(item.querySelector('textarea').value)
                li.appendChild(textNode)
                pdfOutcomeList.appendChild(li)}

            }
        }


        if (pdfTable) {

            for (let i = 1; i < tableRows.length; i++) {
                pdfTable.appendChild(remTextAreaforTable(tableRows[i]))
            }
        }

        if (pdfReadinglist) {


            for (let i = 1; i < readingTableRow.length; i++) {
                console.log(readingTableRow[i])
                pdfReadinglist.appendChild(convertToAPA(readingTableRow[i]))
            }
        }
     
        if(internalAss.value != ''){
            pdfWindow.document.getElementById('internal-assessment').innerText = internalAss.value;
        }

        if(externalAss.value != ''){
            pdfWindow.document.getElementById('external-assessment').innerText = externalAss.value;
        }


    } // onload function ends


})

// takes table row as an argument and combines the row string values to return APA referencing style 
function convertToAPA(tableRow){
    let newRow = tableRow.cloneNode(true);
    let li = document.createElement('li')
    let APA='';

    for(let i = 0; i < newRow.cells.length;i++){
        let cell = newRow.cells[i]
        let textArea = cell.querySelector('textarea');
        let inputArea = cell.querySelector('input');

        if(inputArea){
            APA += `(${inputArea.value})`
        }
        if(textArea){
            APA += `${textArea.value.trim()}`
        }
        if(i < newRow.cells.length-1){
            APA += `, `
        }
    }

    li.appendChild(document.createTextNode(APA))
    return li

}

// function to remove text area from a table row
function remTextAreaforTable(row) { // returns array
    // Create a new row to avoid modifying the original DOM
    var newRow = row.cloneNode(true);

    for (let j = 0; j < newRow.cells.length; j++) {
        var cell = newRow.cells[j];

        // Get the input  inside the cell
        var textarea = cell.querySelector('textarea');
        var inputarea = cell.querySelector('input');

        if (inputarea) {
            // Copy the value from the textarea
            var inputareaValue = inputarea.value;

            // Remove the textarea
            cell.removeChild(inputarea);

            // Create a new text node with the textarea value
            var newText = document.createTextNode(inputareaValue);

            // Append the text node to the cell
            cell.appendChild(newText);
        }

        // Check if a textarea is found
        if (textarea) {
            // Copy the value from the textarea
            var textareaValue = textarea.value;

            // Remove the textarea
            cell.removeChild(textarea);

            // Create a new text node with the textarea value
            var newText = document.createTextNode(textareaValue);

            // Append the text node to the cell
            cell.appendChild(newText);
        }
    }
    return newRow;
}

function createListItem() {
    const newitem = document.createElement('li')
    newitem.innerHTML = ' <textarea name="" id="" cols="100" rows="2"></textarea>'
    return newitem
}

function createRow(num) {
    const newRow = document.createElement('tr')

    for (let i = 0; i < num; i++) {
        const newCell = document.createElement('td');
        const textarea = document.createElement('textarea');
        textarea.name = `textarea-${i + 1}`;
        textarea.cols = 35; // Set the desired number of columns
        textarea.rows = 3;  // Set the desired number of rows
        newCell.appendChild(textarea);
        newRow.appendChild(newCell);
    }

    const anotherCell = document.createElement('td');
    anotherCell.innerHTML = '<input type="number" id="quantity" name="quantity" min="1" >'
    newRow.appendChild(anotherCell)

    return newRow
}

// For adding new list item in list-sections
document.addEventListener('click', (e) => {
    if (e.target.classList.contains('add-list-item')) {
        let listitem = createListItem()
        e.target.parentNode.querySelector('ol').appendChild(listitem);
    }
    if (e.target.classList.contains('read-add-row')) {
        let newRow = createRow(2)
        document.getElementById('recommended-reading-table').querySelector('tbody').appendChild(newRow)
    }
    if (e.target.classList.contains('read-del-row')) {
        let tbody =  document.getElementById('recommended-reading-table').querySelector('tbody')
       if(tbody.children.length > 1)
       {
       tbody.removeChild(tbody.lastChild)}
    }

    if (e.target.classList.contains('add-row')) {
        let newRow = createRow(3)
        document.getElementById('content-table').querySelector('tbody').appendChild(newRow)
    }

    if (e.target.classList.contains('del-row')) {
        let tbody=  document.getElementById('content-table').querySelector('tbody')
       if(tbody.children.length > 1)
       {
       tbody.removeChild(tbody.lastChild)}
    }
})
