let canvas = document.getElementById('canvas');
let context = canvas.getContext('2d');
let background = new Image(600,600);
let initialTree = 10;
let posArray = [];
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
    const r = Math.floor(180 * Math.random());
    const u  = 2 * Math.random() * Math.PI;
    const pos = size/2
    return {
        x: pos + r * Math.cos(u),
        y: pos + r * Math.sin(u)
    };
}

canvas.addEventListener('mousedown', (event) => {
    function getMousePosition(canvas, event) {
        const rect = canvas.getBoundingClientRect();
        return {
            x: event.clientX - rect.left,
            y: event.clientY - rect.top
        };
    }
    const position = getMousePosition(canvas, event);
}, false);

background.addEventListener('load', () => {
    context.drawImage(background, 0,0, 600, 600);
    for(let i = 0; i < 10; i++){
        addTree();
    }
}, false);

// listener
const addTree = () => {
    let pos = generatePosition(600);
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
    }
}

//constant
const id = setInterval(()=> {
    posArray.splice([Math.floor(Math.random() * posArray.length)],1);
    posArray.splice([Math.floor(Math.random() * posArray.length)],1);

    context.clearRect(0,0,600,600);
    context.beginPath();
    let background = new Image(600,600);
    background.src = 'earth.png';
    background.addEventListener('load', () => {
        context.drawImage(background, 0,0, 600, 600);
    }, false);
    posArray.forEach((pos) => {
        let tree = new Image(52, 80);
        tree.src = './tree.png';
        tree.addEventListener('load', ()=> {
            context.drawImage(tree, pos.x, pos.y, 52, 80);
        });
    });
    flag = true;
    initialTree -= 2;
    console.log(initialTree);
    if(initialTree <= 0) {
        clearInterval(id);
        console.log("game over")
    }
},3000);
