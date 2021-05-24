const add_inputs_button = document.querySelector(".add_inputs_button");
let buttonContainer = Array.from(addForm.querySelectorAll(".form-group"));
buttonContainer = buttonContainer[buttonContainer.length - 1];
// console.log(buttonContainer);

add_inputs_button.addEventListener("click", add_inputs_event);

// event listeners
function add_inputs_event() {

    buttonContainer.insertAdjacentElement("beforebegin",
        createElement(
            "div",
            "",
            "row",
            [],
            // form-group Start
            createElement("div", "", "form-group col-md-6", [],
                createElement("label", "libelle", "", [{ name: "for", value: "libelle" }]),
                createElement("input", "", "form-control",
                    [
                        { name: "type", value: "text" },
                        { name: "name", value: "libelle" },
                        { name: "id", value: "libelle" },
                        { name: "placeholder", value: "Libelle" }
                    ]
                )
            ),
            // form-group End

            // form-group Start
            createElement("div", "", "form-group col", [],
                createElement("label", "Effectif", "", [{ name: "for", value: "effectif" }]),
                createElement("input", "", "form-control",
                    [
                        {
                            name: "type",
                            value: "number"
                        },
                        {
                            name: "name",
                            value: "effectif"
                        },
                        {
                            name: "id",
                            value: "effectif"
                        },
                        {
                            name: "placeholder",
                            value: "Effectif"
                        }
                    ]
                )
            ),
            // form-group End
        )
    )
}