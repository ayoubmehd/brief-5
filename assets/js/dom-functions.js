
// DOM Functions
function clearSelect(select, placeholder, initial = true) {
    select.innerHTML = `<option ${initial ? "selected" : ""} disabled>${placeholder}</option>`;
}

function createButton(form, name, className, text, type = "submit") {

    const button = document.createElement("button");
    button.setAttribute("form", form);
    button.name = name;
    button.className = className;
    button.textContent = text;
    button.type = type;
    return button;
}

function createTr(...children) {

    const tr = document.createElement("tr");
    children.forEach(td => {
        tr.appendChild(td);
    });
    return tr;
}

function createTd(text, atributes = [], ...children) {
    const td = document.createElement("td");
    td.textContent = text;
    atributes.forEach(attr => {
        td.setAttribute(attr.name, attr.value);
    });
    children.forEach(child => {
        td.appendChild(child);
    });
    return td;
}

function createA(text, href, className, clickEvent = () => { }, ...children) {
    const a = document.createElement("a");
    a.textContent = text;
    a.href = href;
    a.className = className;
    a.addEventListener("click", clickEvent);
    children.forEach(child => {
        a.appendChild(child);
    });

    return a;
}

// End DOM Functions