class Image {
    constructor(src, alt, id) { //chaque img qu'on va stocker dans la class image
        this.src = src;
        this.alt = alt;
        this.id = id;

    }
}

class Slider { 
    constructor() {
        this.images = [
            new Image("../public/imgs/first_image.jpg", "img1alt", "firstImage"), //avec new on fait appel
            new Image("../public/imgs/second_image.jpg", "img2alt", "secondImage"), // au constructor 
            new Image("../public/imgs/thirst_image.jpg", "img3alt", "thirstImage"), //a class Image
        ]
        this.compteur = 0;
    }

    changer() {
      let images= this.images;
      let compteur= this.compteur;
      setInterval(function(){
        document.getElementById('firstImage').src=images[compteur].src; //prend l'img dans html avec la src, stocke dans le tableau
        compteur++;
        if(compteur==3){
         compteur=0;
        }
      }, 2000);

    }
    
}


let slider = new Slider();  
slider.changer(); 