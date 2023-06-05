import styles from "https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" assert { type: "css" };
export class myBody extends HTMLElement{
    constructor(){
        super();
        document.adoptedStyleSheets.push(styles);
    }
    async components(){
        return await (await fetch("view/my-body.html")).text();
    }

    countSelect(e){
        let $ = e.target;
        if($.nodeName == "BUTTON"){
            let inputAmout = document.querySelectorAll(`#${$.dataset.row} input`);
            if($.innerHTML == "-"){
                inputAmout.forEach(e => {
                    if(e.name == "Acount" && e.value == 0){
                        document.querySelector(`#${$.dataset.row}`).remove();
                    } else if(e.name =="Acount"){
                        e.value--;
                    }
                });
            } else if($.innerHTML == "+"){
                inputAmout.forEach(e => {
                    if(e.name =="Acount"){
                        e.value++
                    }
                })
            }
        }
    }

    connectedCallback(){
        document.adoptedStyleSheets.push(styles);
        this.components().then(html=>{
            this.innerHTML = html;
            this.container = this.querySelector("#products");
            this.container.addEventListener("click", this.countSelect)
        })
    }
}
customElements.define('my-body',myBody);