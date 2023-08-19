const wrapper = document.querySelector('.wrapper');
const signInCategory = document.querySelector('.form-wrapper.sign-in select');

signInCategory.addEventListener('change', () => {
    const selectedCategory = signInCategory.value;
    displayCategoryWindow(selectedCategory);
});



function displayCategoryWindow(category) {
  const categoryOptions = {
    category1: 'Cats',
    category2: 'Dogs',
    category3: 'Flowers',
    category4: 'Birds',
    category5: 'Fruits',
    category6: 'Cars',
    category7: 'Bikes',
    category8: 'Buildings',
    category9: 'Fishes',
    category10: 'Snakes',
  };
  const windowWidth = 900;
  const windowHeight = 800;
  const windowLeft = (window.screen.availWidth - windowWidth) / 2;
  const windowTop = (window.innerHeight - windowHeight) / 2;
  const categoryName = categoryOptions[category] || 'Unknown Category';
  const newWindow = window.open('', '_blank', `width=${windowWidth},height=${windowHeight},left=${windowLeft},top=${windowTop}`);
  
  newWindow.document.write(`
    <style>
      h1 {
        text-align: center;
      }
      .image-container {
        display: flex;
        flex-wrap: wrap;
        justify-content: center;
        padding: 10px;
      }
      .image-option {
        width: 200px;
        height: 200px;
        margin: 10px;
        border-radius: 5px;
        cursor: pointer;
        overflow: hidden;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
        transition: box-shadow 0.3s ease;
      }
      .image-option:hover {
        box-shadow: 0 10px 18px rgba(255, 0, 0, 0.3);
      }
      img {
        width: 100%;
        height: 100%;
        object-fit: cover;
      }
    </style>
    <h1>${categoryName}</h1>
    <div class="image-container"></div>
  `);
  newWindow.document.title = categoryName; // Set the window title to the category
  const imageContainer = newWindow.document.querySelector('.image-container');

  // Load and display the images in the new window
  const totalImages = 16; // Total number of images per category
  const categoryImages = 
  {
  Cats: 'cats',
  Dogs: 'dogs',
  Cars: 'cars',
  Flowers: 'flowers',
  Birds: 'birds',
  Snakes: 'snakes',
  Bikes: 'bikes',
  Buildings: 'buildings',
  Fishes: 'fishes',
  Fruits: 'fruits',

  };
  let simg=[];
  const categoryFolder = categoryImages[categoryName];
  for (let i = 1; i <= totalImages; i++) {
  const imageOption = newWindow.document.createElement('div');
  imageOption.className = 'image-option';

  const image = newWindow.document.createElement('img');
  image.src = `${categoryFolder}/image${i}.jpg`;
  
  image.addEventListener('click', () => {
      openFragmentedWindow(image.src, newWindow);
      simg.push(i);
      document.getElementById("imgnoA").value=simg[0];

    });

  imageOption.appendChild(image);
  imageContainer.appendChild(imageOption);
}
console.log(simg);

}

function openFragmentedWindow(imageSrc, parentWindow,t) {
  const windowWidth = parentWindow.innerWidth / 2 + 180;
  const windowHeight = parentWindow.innerHeight / 2 + 180;
  const windowLeft = (parentWindow.screen.availWidth - windowWidth) / 2  ;
  const windowTop = (parentWindow.innerHeight - windowHeight) / 2 ;
  const newWindow = parentWindow.open('', '_blank', `width=${windowWidth},height=${windowHeight},left=${windowLeft},top=${windowTop}`);

newWindow.document.write(`
    <style>
       #wrapper {
        display: flex;
        flex-wrap: wrap;
        justify-content: center;
        align-items: center;
        padding: 10px;
        gap: 5px;
      }
      .submit-button {
        width: 100%;
        text-align: center;
        margin-top: 20px;
      }

      .submit-button button {
        padding: 10px 20px;
        background-color: #15cff4;
        color: #fff;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        transition: background-color 0.3s ease;
      }

      .submit-button button:hover {
        background-color: #0da9c2;
      }


      .splitImg {
        padding: 1px;
        background-clip: content-box;
        background-repeat: no-repeat;
        transition: transform 0.3s ease-in-out, background-color 0.3s ease-in-out;
        position: relative; 
        overflow: hidden; 
      }

      .splitImg:hover {
        transform: scale(1.04); 
        background-color: #e2e2e2; 
        cursor: pointer; 
      }

      .tick-mark {
        position: absolute; 
        top: 10px; 
        left: 10px; 
        font-size: 18px; 
        color: red;
      }
    </style>
    <div id="wrapper"></div>
    <div class="image-container"></div>
    <div class="submit-button">
      <button id="submitBtn">Submit</button>
    </div>
  `);

  const wrapper = newWindow.document.getElementById('wrapper');
  const selectedGrids = []; 
  const img = new Image();
  img.src = imageSrc;
  img.onload = function() {
    const width = this.width;
    const height = this.height;
    const length = 4;
    const ylength = 4;

    for (let j = 0; j < length; j++) {
      for (let i = 0; i < length; i++) {
        const left = (-1 * width / length * i).toString() + "px";
        const top = (-1 * height / ylength * j).toString() + "px";
        const element = newWindow.document.createElement('div');
        element.id = i + "" + j;
        element.className = "splitImg";
        element.style.width = `${Math.floor(width / length)}px`;
        element.style.height = `${Math.floor(height / ylength)}px`;
        element.style.backgroundPosition = `${left} ${top}`;
        element.style.backgroundImage = `url("${imageSrc}")`;

        element.addEventListener('click', function() {
          const currentGrid = this;
          if (selectedGrids.length >= 2) {
            // If two grids are already selected, remove the tick mark from the oldest selected grid
            const oldestGrid = selectedGrids.shift();
            oldestGrid.querySelector('.tick-mark').remove();
          }
          if (selectedGrids.includes(currentGrid)) {
            // If the current grid is already selected, deselect it
            currentGrid.querySelector('.tick-mark').remove();
            selectedGrids.splice(selectedGrids.indexOf(currentGrid), 1);
          } else {
            // If the current grid is not selected, add the tick mark and mark it as selected
            const tickMark = newWindow.document.createElement('div');
            tickMark.className = 'tick-mark';
            tickMark.innerHTML = '&#10004;';
            currentGrid.appendChild(tickMark);
            selectedGrids.push(currentGrid);
            // Check if two grids are selected, and if yes, compare their IDs as integers
      if (selectedGrids.length === 2) {
        const grid1ID = parseInt(selectedGrids[0].id, 10);
        const grid2ID = parseInt(selectedGrids[1].id, 10);
        document.getElementById('grid1A').value = grid1ID;
        document.getElementById('grid2A').value = grid2ID;
      }
          }
        });
        wrapper.appendChild(element);
        
      }
    }
    
  

  };

  const submitButton = newWindow.document.getElementById('submitBtn');
  submitButton.addEventListener('click', () =>
  {
    if (selectedGrids.length === 2) {
      newWindow.close(); // Close the fragmented window
      parentWindow.close();
    } else
    {
      newWindow.alert('Please select 2 grids.');
    }
  });
}