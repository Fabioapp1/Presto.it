import AOS from 'aos';
AOS.init({
	easing: 'ease-out-back',
	duration: 1000
});

const deleteBtns = document.querySelectorAll('[data-role="deleteAnnouncement"]');
const deleteForm = document.querySelector('#deleteAnnouncement');

for(let btn of deleteBtns) {

	btn.addEventListener('click', e => {
		const action = e.target.getAttribute('data-action');
		deleteForm.setAttribute('action', action);
	}
	
	)
}