
const buttons = document.querySelectorAll('button[data-filter]');
const items = document.querySelectorAll('ol > li');

buttons.forEach(button => button.addEventListener('click', handleClick));

function handleClick(e) {

  // disable the button that was just clicked
	this.disabled = true;
	this.classList.add('cursor-not-allowed', 'opacity-50');
	let filterType = this.dataset.filter;

  // enable all other filter buttons
	let otherButtons = [...buttons].filter(function(button) { 
    return button.dataset.filter != filterType;
	});

	otherButtons.forEach(button => {
		button.disabled = false;
		button.classList.remove('cursor-not-allowed', 'opacity-50');
	});

  if (filterType === 'empty') {
    showEmpty();
  } else if (filterType === 'matches') {
  	showMatches();
  } else if (filterType === 'all') {
  	showAll();
  }

  updateItemCount();
}

const showEmpty = () => {
	items.forEach(function (item, index) {
  	let text = item.querySelector('span.result').textContent.replace(/\s+/g, " ").trim();

  	if (text !== '-') {
  		item.classList.add('hidden');
  	} else {
  		item.classList.remove('hidden');
  	}
  });
}

const showMatches = () => {
	items.forEach(function (item, index) {
  	let text = item.querySelector('span.result').textContent.replace(/\s+/g, " ").trim();

  	if (text === '-') {
  		item.classList.add('hidden');
  	} else {
  		item.classList.remove('hidden');
  	}
  });
}

const showAll = () => {
	items.forEach(function (item, index) {
  	item.classList.remove('hidden');
  });
}

const updateItemCount = () => {
	
  const visibleElements = [...items].filter(function(item) { 
    return !item.classList.contains('hidden');
	});

	const visibleElementsCount = visibleElements.length;
	const itemCounts = document.querySelectorAll('.item-count');
	itemCounts.forEach(itemCount => itemCount.textContent = `${visibleElementsCount} item${visibleElementsCount === 1 ? '' : 's'}`);
}
