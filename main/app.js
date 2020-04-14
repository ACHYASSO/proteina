////////////////////////////////////////////////////
//Select1 configuration
////////////////////////////////////////////////////



let select1 = document.getElementById("select1");
select1.addEventListener("change", function(e){ //Appelée lors du changement

	//recuperer l'element selectionné
	let selection = e.target.value;

	
	//charger les pays depuis la BDD directement

	//console.log("/proteina/main/users.php?parametre="+encodeURIComponent(selection));

	//console.log(selection);

	fetch("/proteina/main/users.php?parametre="+encodeURIComponent(selection))
	.then(function(response){
		response.json().then(function(d){
			
			let select2 = document.getElementById("select2");
			let names =d["names"];

			//retirer les elements de la deuxiemme liste
			while( select2.options.length )
				select2.options.remove(0);

			//ajouter les noms a la deuxiemme liste
			let opt=document.createElement("option");
			opt.text="--Choisir--";
			select2.options.add(opt);
			
			for(let i=0;i<names.length;++i){
				let opt=document.createElement("option");
				opt.text=names[i]["nom"];
				opt.value=names[i]["id"];
				select2.options.add(opt);
			}
		});
	});
});

////////////////////////////////////////////////////
//Select2 configuration
////////////////////////////////////////////////////

let select2 = document.getElementById("select2");
select2.addEventListener("change", function(e){ //Appelée lors du changement

	//recuperer l'element selectionné
	let selection = select1.value;

	
	//charger les pays depuis la BDD directement

	//console.log("/proteina/main/users.php?parametre="+encodeURIComponent(selection));

	//console.log(selection);

	fetch("/proteina/main/ems.php?parametre="+encodeURIComponent(selection))
	.then(function(response){
		response.json().then(function(d){
			
			let select3 = document.getElementById("select3");
			let names =d["names"];

			//retirer les elements de la deuxiemme liste
			while( select3.options.length )
				select3.options.remove(0);

			let opt=document.createElement("option");
			opt.text="--Choisir--";
			select3.options.add(opt);
			//ajouter les noms a la deuxiemme liste
			for(let i=0;i<names.length;++i){
				let opt=document.createElement("option");
				opt.text=names[i]["nom"];
				opt.value=names[i]["id"];
				select3.options.add(opt);
			}
		});
	});
});