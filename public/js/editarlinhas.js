function editarLinha(){
	let button = document.getElementById("editar_dados");
	let table = document.getElementById("tbody0");

	for(let i = 0, row; row = table.rows[i]; i++){
		for(let j = 1, col; col = row.cells[j]; j++){
			row.cells[j].contentEditable = true;
		}
	}

	let tbody = document.getElementById("tbody0");

	if(document.getElementById("confirmar_edicao")){

	} else {
		let newButton = document.createElement('button');
		newButton.className = "btn btn-default";
		newButton.id = "confirmar_edicao";
		newButton.innerHTML = "Confirmar edição";
		newButton.onclick = apagarConfirmarEdicao();
		newButton.setAttribute('type', 'submit');
		tbody.appendChild(newButton);
	}
}

function apagarConfirmarEdicao(){
	if (document.getElementById("confirmar_edicao")){
		let element = document.getElementById("editar_dados");
		element.nextElementSibling.remove();
	}
}