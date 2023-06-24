const signUpBtnLink = document.querySelector('.signUpBtn-link');
const signInBtnLink = document.querySelector('.signInBtn-link');
const wrapper = document.querySelector('.wrapper');
const forgotLink = document.querySelector('#forgotLink');
const signUpCategory = document.querySelector('.form-wrapper.sign-up select');
const signInCategory = document.querySelector('.form-wrapper.sign-in select');

signUpBtnLink.addEventListener('click', () => {
    wrapper.classList.toggle('active');
});

signInBtnLink.addEventListener('click', () => {
    wrapper.classList.toggle('active');
});

signUpCategory.addEventListener('change', () => {
    const selectedCategory = signUpCategory.value;
   let t="Up";
    displayCategoryWindow(selectedCategory,t);
});

signInCategory.addEventListener('change', () => {
    const selectedCategory = signInCategory.value;
    let t="In";
    displayCategoryWindow(selectedCategory,t);
});



forgotLink.addEventListener('click', () => {
    const windowWidth = 700;
    const windowHeight = 500;
    const windowLeft = (window.screen.availWidth - windowWidth) / 2;
    const windowTop = (window.innerHeight - windowHeight) / 2 + 100;

    const forgotWindow = window.open('', '_blank', `width=${windowWidth},height=${windowHeight},left=${windowLeft},top=${windowTop}`);
    forgotWindow.document.write(`
    <?php include 'Config.php';?>
        <style>
            body {
                display: flex;
                flex-direction: column;
                align-items: center;
                justify-content: center;
                height: 100vh;
                margin: 0;
                font-family: Arial, sans-serif;
                text-align: center;
                background-color: #f5f5f5;
            }
            h1 {
                margin-top: 0;
                color: #333;
            }
            p {
                margin-bottom: 20px;
                color: #777;
            }
            form {
                display: flex;
                 flex-direction: column;
                align-items: center;
                margin-top: 20px;
            }
            input[type="email"] {
                padding: 10px;
                margin-bottom: 10px;
                border-radius: 4px;
                border: 1px solid #ccc;
                font-size: 16px;
                width: 300px;
                max-width: 100%;
            }
            button[type="submit"] {
                padding: 10px 20px;
                background-color: #15cff4;
                color: #fff;
                border: none;
                border-radius: 4px;
                font-size: 16px;
                cursor: pointer;
                transition: background-color 0.3s ease;
            }
            button[type="submit"]:hover {
                background-color: #0da9c2;
            }
        </style>
        <h1>Forgot Password?</h1>
        <p>Please enter your email address to reset your password:</p>
        <form id="resetForm" action="POST">
            <input type="email" name="email" required>
            <button type="submit" name="enterotp">Reset Password</button>
        </form>
        <script>
            const resetForm = document.getElementById('resetForm');
            resetForm.addEventListener('submit', function(event) {
                event.preventDefault(); // Prevent form submission
                window.location.href = 'verify.php';
                return false;
            });
        </script>
    `);
});





function displayCategoryWindow(category,t) {
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
      openFragmentedWindow(image.src, newWindow,t);
      simg.push(i);
      if(t=="Up")
      document.getElementById("imgno").value=simg[0];
      else
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
  // const wrapper = newWindow.document.querySelector('.wrapper');
  // const grid1Input = newWindow.document.getElementById('grid1');
  // const grid2Input = newWindow.document.getElementById('grid2');
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
            if(t=="Up")
            document.getElementById("grid1").value=selectedGrids[0].id;
            else
            document.getElementById("grid1A").value=selectedGrids[0].id;
            if(t=="Up")
            document.getElementById("grid2").value=selectedGrids[1].id;
            else
            document.getElementById("grid2A").value=selectedGrids[1].id;


            // console.log(selectedGrids[0].id);
            // console.log(selectedGrids[1].id);
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