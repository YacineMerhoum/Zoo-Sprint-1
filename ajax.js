//  AJAX DU BOUTTON SUPRIMER ANIMAL
const ajaxs = document.querySelectorAll("#monFormulaire")
ajaxs.forEach(ajax => {
    

ajax.addEventListener("submit", async function (event){
    console.log();
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
        let card = document.querySelector("#animal-"+ input)
        card.remove()
    })
})

});
        
//  Bouton nourir ajax 
const eats = document.querySelectorAll("#allEat")
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
            let progress = document.querySelector(".progress-hungry-" + eatInput)
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
            let progress = document.querySelector(".progress-clean-" + washInput)
            progress.style.width = parseInt(progress.style.width.replace("%" , "")) + 5 + "%"
            progress.innerHTML = progress.style.width
            
        })
    })
})

//  TEST POUR diminuer automatiquement LA PROPRETE

setInterval(() => {
    
    let progress = document.querySelectorAll(".test")
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



// // AJAX DU NOUVEL ANIMAL 
// let create = document.querySelector("#createAnimal")
// create.addEventListener("submit" , async function(event){
//     console.log(create);
//     event.preventDefault()

//     const createInput = document.querySelector("#creation").value
//     let formData = new FormData()
//     formData.append("nameAnimal" , createInput)
    

//     fetch("pageTigres.php" , {
//         method: "POST",
//         body: formData

//     }).then((response)=>{
//         return response.json()
//     }).then((data)=>{
//         console.log(data);
        
//         let creation = document.querySelector("#cardJs")
//         creation.innerHTML += `
//         <div class="d-flex align-items-start">
//             <div class="cards" id="animal-">
//                 <div class="wrapper">

//                     <img src="../medias/1992-rajah-01.jpg" class="cover-image" >
//                     <div class="card-text-overlay">
//                         <p class="card-text">Age : ${data.age}</p>
//                         <p class="card-text">Poids : 10 </p>
//                         <p class="card-text">Taille : 1 </p>
//                         <p class="card-text">Appêtit : </p>
//                         <div class="progress" role="progressbar" aria-label="Success example" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">
//                             <div class="progress-bar bg-success progress-hungry-" style="width: ${data.appetit}%">${data.appetit}%</div>
//                         </div>
//                         <p class="card-text">Propreté : </p>
//                         <div class="progress" role="progressbar" aria-label="Success example" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">
//                             <div class="test progress-bar bg-info progress-clean-
//                             " style="width: ${data.proprete}%">${data.proprete}%</div>
//                         </div>
//                     </div>

//                 </div>
//                 <h5 class="title"> ${data.name}</h5>
//                 <img src="../medias/iconetigre-removebg-preview.png" id="raja"  class="character" />
//                 <div class="character d-flex justify-content-between ">

//             <form method="post" id="wash">
//             <input type="hidden" name="clean" id="getWash" value="${data.id}">
//             <button type="submit"  class="buttonAnimal text-white btn btn-info p-2">Nettoyer</button>
//             </form>

//             <form method="post" id="allEat">
//             <input type="hidden" id="getEat" name="nourir" value="${data.id}">
//             <button type="submit" class="buttonAnimal btn btn-success p-2">Nourrir</button>
//             </form>
            
//             <form method="post" id="monFormulaire">
//                 <input type="hidden" name="id" id="getId" value="${data.id}">
//                 <button id="libererBtn" type="submit" class="buttonAnimal btn btn-danger p-2">Libérer</button>
//             </form>
            
//             </div>
//         </div>
//     </div>
        
//         `
        
        
//     })
// });