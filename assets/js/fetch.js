async function fetchElm(endpoint) {
  const result = await fetch(`/api/${endpoint}`);
  const resultJson = await result.json();

  return resultJson;
}

async function show(parentElm, endpoint, filds, edit_endpoint, delete_endpoint) {
  const result = await fetchElm(endpoint);
  parentElm.innerHTML = "";
  result.data.forEach((elm) => {
    parentElm.appendChild(createTr(
      createTd(elm.id, [{ name: "scope", value: "row" }]),
      ...filds.map(fild => createTd(elm[fild])),
      createTd("", [],
        createA("Edit", `/${edit_endpoint}/${elm.id}`, "btn btn-success edit-button", editButtonsClick),
        document.createTextNode(" "),
        createA("Remove", `/${delete_endpoint}/${elm.id}`, "btn btn-danger")
      ),
    ));
  });
}
