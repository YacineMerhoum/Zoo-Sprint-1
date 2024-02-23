//  AJAX DU BOUTTON SUPRIMER ANIMAL
const ajaxs = document.querySelectorAll("#deleteAnimal")
ajaxs.forEach(ajax => {
    

ajax.addEventListener("submit", async function (event){
    
    event.preventDefault();

    const input = event.target.children[0].value
    let formData = new FormData()

    formData.append("id" , input)

    fetch("pageTigres.php" , {
        method: "POST",
        body: formData

    }).then((response) =>{
        return response.text()
    }).then((data) =>{
        let card = document.querySelector("#animalDelete-" + input)
        card.remove()
    })
})

});
        
//  Bouton nourir ajax 
const eats = document.querySelectorAll("#eat")
eats.forEach(eat => {
    eat.addEventListener("submit" , async function (event){
        console.log(event);
        event.preventDefault();
        

        const eatInput = event.target.children[0].value
        let formData = new FormData()
        formData.append("nourir" , eatInput)
        formData.append("eat_value" , 5)

        fetch("pageTigres.php" , {
            method: "POST",
            body: formData

        }).then((response) =>{
            return response.text()
        }).then((data) =>{
            let progress = document.querySelector(".progress-eat-" + eatInput)
            progress.style.width = parseInt(progress.style.width.replace('%', '')) + 5 + "%"  
            progress.innerHTML = progress.style.width
        })

    })
});
// Bouton nettoyer AJAX
const washs = document.querySelectorAll("#wash")
washs.forEach(wash => {
    wash.addEventListener("submit" , async function (event){
        event.preventDefault();

        const washInput = event.target.children[0].value
        let formData = new FormData()
        formData.append("clean_id" , washInput)
        formData.append("clean_value" , 5)

        fetch("pageTigres.php" , {
            method: "POST",
            body: formData
        
        }).then((response) => {
            return response.text()
        }).then((data) => {
            let progress = document.querySelector(".progress-wash-" + washInput)
            progress.style.width = parseInt(progress.style.width.replace("%" , "")) + 5 + "%"
            progress.innerHTML = progress.style.width
            
        })
    })
})



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
    
    let progress = document.querySelectorAll(".eatMaj")
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