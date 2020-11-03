(document.querySelectorAll("[data-toggle=modal]")).forEach(elem => {
	if (!elem) return;

	elem.addEventListener("click", e => {
		e.preventDefault()

		const idModalTarget = e.target.dataset.target
		const modalElem = document.querySelector(idModalTarget)

		modalElem.childNodes[1].childNodes[1].style.opacity = "1"
		modalElem.classList.toggle("fade")
		document.body.classList.add("modal-open")
	})
})

document.querySelectorAll(".modal").forEach(elem => {
	if (!elem) return;

	elem.querySelectorAll("[data-dismiss=modal]").forEach(cancelBtn => {
		cancelBtn.addEventListener("click",e => {
			elem.childNodes[1].childNodes[1].style.opacity = "0"
			elem.classList.toggle("fade")
		})
	})
})

// const semuaModalClose = document.querySelectorAll(".modal .modal-dialog .modal-content .modal-header .close")

// semuaModalClose.forEach(elem => {
// 	elem.addEventListener("click", e => {
// 		let modalElem = elem.parentNode.parentNode.parentNode.parentNode

// 		modalElem.classList.toggle("fade")
// 		elem.parentNode.parentNode.style.opacity = "0"
// 		document.body.classList.remove("modal-open")
// 	})
// })