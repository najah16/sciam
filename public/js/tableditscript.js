function viewData()
{

}
function tableData()
{
	$('#tabledit').Tabledit({
    url: 'process.php',
    columns: {
        identifier: [0, 'id'],
        editable: [[1, 'nickname'], [2, 'firstname'], [3, 'lastname']]
    }
	});
}