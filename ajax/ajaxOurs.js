// Supression AJAX carte ours
let ajaxs = document.querySelectorAll("#deleteAnimal")
ajaxs.forEach(ajax => {
    ajax.addEventListener("submit", function(event){
        event.preventDefault();

        const deleteInput = event.target.children[0].value
        let formData = new FormData()
        formData.append("id" , deleteInput)

        fetch("pageOurs.php" , {
            method: "POST",
            body: formData
        }).then((response) => {
            return response.text()
        }).then((data) => {
            let card = document.querySelector("#animal-" + deleteInput)
            card.remove()

        })
    })
});

// Nourir AJAX animal
let nourirAjax = document.querySelectorAll("#nourirAnimal");

nourirAjax.forEach(eat => {
    eat.addEventListener("submit", function(event){
        console.log(event);
        event.preventDefault();

        const inputEat = event.target.children[0].value;
        let formData = new FormData();
        formData.append("nourir" , inputEat);
        formData.append("eat_value" , 5);

        fetch("pageOurs.php" , {
            method: "POST",
            body: formData
        }).then((response) =>{
            return response.text();
        }).then((data) => {
            let progress = document.querySelector(".progress-hungry-" + inputEat);
            progress.style.width = (parseInt(progress.style.width) + 5) + "%";  
            progress.innerHTML = progress.style.width;
        });
    });
});
// Nettoyer animal AJAX
let washAnimal = document.querySelectorAll("#washAnimal")
washAnimal.forEach(washAll => {
    washAll.addEventListener("submit" , function(event){
        event.preventDefault()

        const inputClean = event.target.children[0].value;
        let formData = new FormData()
        formData.append("clean" , inputClean)
        formData.append("clean_value" , 5)

        fetch("pageOurs.php" , {
            method: "POST",
            body: formData
        
        }).then((response) => {
            return response.text()
        }).then((data) => {
            let progress = document.querySelector(".progress-clean-" + inputClean)
            progress.style.width = parseInt(progress.style.width.replace("%" , "")) + 5 + "%"
            progress.innerHTML = progress.style.width
        })
    })
    
});

setInterval(() => {
    
    let progress = document.querySelectorAll(".majWash")
    progress.forEach(element => {
        if (parseInt(element.style.width.replace("%" , "")) <= 0) {
            return
        }
            
        let formData = new FormData()
        formData.append("clean_id" , element.getAttribute('data-id'))
        formData.append("clean_value" , -1)

        fetch("pageTigres.php" , {
            method: "POST",
            body: formData
        
        }).then((response) => {
            return response.text()
        }).then((data) => {
           
            element.style.width = parseInt(element.style.width.replace("%" , "")) - 1 + "%"
            element.innerHTML = element.style.width
        })
       
      
    });    
}, 10000);

setInterval(() => {
    
    let progress = document.querySelectorAll(".majEat")
    progress.forEach(element => {
        if (parseInt(element.style.width.replace("%" , "")) <= 0) {
            return
        }
            
        let formData = new FormData()
        formData.append("nourir" , element.getAttribute('data-id'))
        formData.append("eat_value" , -1)

        fetch("pageTigres.php" , {
            method: "POST",
            body: formData
        
        }).then((response) => {
            return response.text()
        }).then((data) => {
           
            element.style.width = parseInt(element.style.width.replace("%" , "")) - 1 + "%"
            element.innerHTML = element.style.width
        })
       
      
    });    
}, 10000);
            

    