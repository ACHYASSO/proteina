let select1 = document.getElementById("select1");


select1.addEventListener("change", function(e){ //Appelée lors du changement

	//recuperer l'element selectionné
	let selection = e.target.value;

	
	//charger les pays depuis la BDD directement

	//console.log("/projet/users.php?parametre="+encodeURIComponent(selection));

	//console.log(selection);

	fetch("/projet/users.php?parametre="+encodeURIComponent(selection))
	.then(function(response){
		response.json().then(function(d){
			
			let select2 = document.getElementById("select2");
			let names =d["names"];

			//retirer les elements de la deuxiemme liste
			while( select2.options.length )
				select2.options.remove(0);

			//ajouter les noms a la deuxiemme liste
			for(let i=0;i<names.length;++i){
				let opt=document.createElement("option");
				opt.text=names[i];
				select2.options.add(opt);
			}
		});
	});
});