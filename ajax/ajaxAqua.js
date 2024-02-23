let deleteFish = document.querySelectorAll("#deleteAnimal")
deleteFish.forEach(fish => {
    fish.addEventListener("submit" , function(event){
        event.preventDefault()

        const inputDelete = event.target.children[0].value
        let formData = new FormData()
        formData.append("id", inputDelete)

        fetch("aquarium.php" , {
            method: "POST",
            body: formData
        
        }).then((response) => {
            return response.text()
        }).then((data) => {
            let deleteCard = document.querySelector("#animal-" + inputDelete)
            deleteCard.remove()
        }) 
    })
});

let eatFish = document.querySelectorAll("#eat")
eatFish.forEach(eat => {
    eat.addEventListener("submit", function(event){
        event.preventDefault()

        const inputEat = event.target.children[0].value
        let formData = new FormData()
        formData.append("nourir" , inputEat)
        formData.append("eat_id" , 5)

        fetch("aquarium.php" , {
            method: "POST",
            body: formData
        
        }).then((response) => {
            return response.text()
        }).then((data) => {

            let progressEat = document.querySelector(".progress-hungry-" + inputEat)
            progressEat.style.width = (parseInt(progressEat.style.width) + 5) + "%";    
            progressEat.innerHTML = progressEat.style.width
        })
    })
    
});

let washFish = document.querySelectorAll("#wash")
washFish.forEach(wash => {
    wash.addEventListener("submit" , function(event){
        event.preventDefault()

        const washInput = event.target.children[0].value
        let formData = new FormData()

        formData.append("clean" , washInput)
        formData.append("clean_id" , 5)

        fetch("aquarium.php" , {
            method: "POST",
            body: formData
        }).then((response) => {
            return response.text()
        }).then((data) => {
            
            let progressWash = document.querySelector(".progress-wash-" + washInput)
            progressWash.style.width = (parseInt(progressWash.style.width) + 5) + "%";    
            progressWash.innerHTML = progressWash.style.width
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

    


        
        
        


    
