import styles from "https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" assert { type: "css" };
export class myProductDetails extends HTMLElement{
    constructor(){
        super();
        document.adoptedStyleSheets.push(styles);
    }
    async components(){
        return await (await fetch("view/my-productdetails.html")).text();
    }
    countSelect(e){
        let $ = e.target;
        if ($.nodeName == "BUTTON") {
            let box = e.target.parentNode.parentNode;
            let inputs = box.querySelectorAll(`input`);
            if ($.innerHTML == "-") {
                inputs.forEach(e => {
                    if (e.name == "Acount" && e.value == 0) {
                        box.parentNode.remove();
                    } else if (e.name == "Acount") {
                        e.value--;
                    }
                });
            } else if ($.innerHTML == "+") {
                inputs.forEach(e => {
                    if (e.name == "Acount") {
                        e.value++;
                    }
                });
            }
        }
    }
    connectedCallback(){
        this.components().then(html=>{
            this.innerHTML = html;
            this.container = document.querySelector("#products");
            this.container.addEventListener("click", this.countSelect);
        })
    }
}
customElements.define("my-productdetails", myProductDetails);
