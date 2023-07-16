let nom = document.getElementById('nom');
let note = document.getElementById('note');
let demande = document.getElementById('testimonial');

formEvent.addEventListener("submit", function (e) {
    if (nom.value.trim() == "" || testimonial.value.trim() == "") {
        let error = document.getElementById('error');
        error.innerHTML = 'Veuillez remplir tout les champs.';
        e.preventDefault();
    } else if (note.value.trim() == "") {
        let error = document.getElementById('error');
        error.innerHTML = 'Veuillez mettre une note.';
        e.preventDefault();
    }
});

window.onload = () => {
    const note = document.getElementById('note');
    const stars = document.querySelectorAll(".fa-star");

    for (let star of stars) {
        star.addEventListener("mouseover", function () {
            resetStars();
            this.style.color = "gold";
            //Element précédent dans le DOM
            let previousStar = this.previousElementSibling;
            while (previousStar) {
                previousStar.style.color = "gold";
                previousStar = previousStar.previousElementSibling;
            }
        });

        star.addEventListener("click", function(){
            note.value = this.dataset.value;
        })

        star.addEventListener("mouseout", function(){
            resetStars(note.value);
        })
    }


    function resetStars(note = 0) {
        for (let star of stars) {
            if(star.dataset.value > note) {
                star.style.color = "grey";
            } else {
                star.style.color = "gold";
            }
        }
    }

}