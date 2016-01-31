/**
 * Projet Name : Dynamic Form Processing with PHP
 * URL: http://techstream.org/Web-Development/PHP/Dynamic-Form-Processing-with-PHP
 *
 * Licensed under the MIT license.
 * http://www.opensource.org/licenses/mit-license.php
 * 
 * Copyright 2013, Tech Stream
 * http://techstream.org
 */

function addRow(tableID) {
	var table = document.getElementById(tableID);
	var rowCount = table.rows.length;
	if(rowCount < 20){							// limit the user from creating fields more than your limits
		var row = table.insertRow(rowCount);
		var colCount = table.rows[0].cells.length;
		for(var i=0; i<colCount; i++) {
			var newcell = row.insertCell(i);
			newcell.innerHTML = table.rows[0].cells[i].innerHTML;
		}
	}else{
		 alert("Maximum Passenger per ticket is 20.");
			   
	}
}

function deleteRow(tableID) {
	var table = document.getElementById(tableID);
    var rowCount = table.rows.length;
    if (rowCount == 1)
    {
        alert("At least one condition is required.");
    }
    else
    {
        table.deleteRow(rowCount-1);
    }

	//var rowCount = table.rows.length;
	//for(var i=0; i<rowCount; i++) {
	//	var row = table.rows[i];
	//	var chkbox = row.cells[0].childNodes[0];
	//	if(null != chkbox && true == chkbox.checked) {
	//		if(rowCount <= 1) { 						// limit the user from removing all the fields
	//			alert("Cannot Remove all the Passenger.");
	//			break;
	//		}
	//		table.deleteRow(table.rows.length-1);
	//		rowCount--;
	//		i--;
	//	}
	//}
}

function checkAll(ele) {
	var checkboxes = document.getElementsByTagName('input');
	//alert(input);
	//dd(checkboxes);
	if (ele.checked) {
		//alert("checked");
		for (var i = 0; i < checkboxes.length; i++) {
			if (checkboxes[i].type == 'checkbox') {
				checkboxes[i].checked = true;
			}
		}
	} else {
		//alert("unchecked");
		for (var i = 0; i < checkboxes.length; i++) {
			console.log(i)
			if (checkboxes[i].type == 'checkbox') {
				checkboxes[i].checked = false;
			}
		}
	}
}

function toggle(source,classname) {
	var checkboxes = document.getElementsByClassName(classname);
	for(var i=0, n=checkboxes.length;i<n;i++) {
		checkboxes[i].checked = source.checked;
	}
}
