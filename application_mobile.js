let canvas = document.getElementById('canvas');
let context = canvas.getContext('2d');
let background = new Image(300,300);
let initialTree = 10;
let posArray = [];
let year = 0;
const decreaseTree = 800;
background.src = 'earth.png';
let flag = true;
function generatePosition(canvas) {
    const rect = canvas.getBoundingClientRect();
    return {
        x: event.clientX - rect.left,
        y: event.clientY - rect.top
    };
}

function generatePosition(size) {
    const r = Math.floor(80 * Math.random());
    const u  = 2 * Math.random() * Math.PI;
    const pos = size/2
    return {
        x: pos + r * Math.cos(u),
        y: pos + r * Math.sin(u)
    };
}

canvas.addEventListener('mousedown', (event) => {
    putAddBtn();
}, false);

background.addEventListener('load', () => {
    context.drawImage(background, 0,0, 300, 300);
    for(let i = 0; i < 10; i++){
        addTree();
    }
}, false);

// listener
const addTree = () => {
    let pos = generatePosition(300);
    let tree = new Image(52, 80);
    tree.src = './tree.png';
    tree.addEventListener('load', ()=> {
        context.drawImage(tree, pos.x, pos.y, 52, 80);
    });
    posArray.push(pos);
}

const putAddBtn = () => {
    if(flag){
        initialTree+=1
        addTree();
        flag = !flag;
        changeBar();
    }
}

const changeBar = () => {
    let bar = document.getElementById('bar');
    bar.setAttribute("aria-valuenow", initialTree);
    bar.setAttribute("style", "width:" + 100 * (initialTree/10) +"%");
}

//constant
const id = setInterval(()=> {
    flag = true;
    initialTree -= 2;
    year += 100;
    changeBar();
    posArray.splice([Math.floor(Math.random() * posArray.length)],1);
    posArray.splice([Math.floor(Math.random() * posArray.length)],1);
    let yearElm = document.getElementById('year');
    yearElm.textContent = year + "年後";
    context.clearRect(0,0,300,300);
    context.beginPath();
    let background = new Image(300,300);
    background.src = 'earth.png';
    background.addEventListener('load', () => {
        context.drawImage(background, 0,0, 300, 300);
    }, false);

    posArray.forEach((pos) => {
        let tree = new Image(52, 80);
        tree.src = './tree.png';
        tree.addEventListener('load', ()=> {
            context.drawImage(tree, pos.x, pos.y, 52, 80);
        });
    });
    if(initialTree <= 0) {
        clearInterval(id);
        console.log("game over")
        $('#exampleModal').modal('show')
    }
},10000);
