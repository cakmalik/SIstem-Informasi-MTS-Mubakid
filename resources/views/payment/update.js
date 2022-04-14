function updateForm() {
    // siapkan id google form (di url setelah /d/..disini../)
    var form = FormApp.openById("Your Form ID");
    // Identifikasi dimana letak dropdown (dengan id / data-item-id)
    var namesList = form.getItemById("The Drop-Down List ID").asListItem();
    var ss = SpreadsheetApp.getActive();
    var names = ss.getSheetByName("Name of Sheet in Spreadsheet");
    //grab nilai dari google sheet (param1: baris, param2: kolom)
    var namesValues = names.getRange(2, 1, names.getMaxRows() - 1).getValues();
    var studentNames = [];
    // jadikan array kecuali yang kosong
    for (var i = 0; i < namesValues.length; i++)
        if (namesValues[i][0] != "") studentNames[i] = namesValues[i][0];
    // terapkan
    namesList.setChoiceValues(studentNames);
}
