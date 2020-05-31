let carData = [];

const getCars = async () => {
  await $.ajax({
      method: 'GET',
      url: './db/cars.xml',
      success: (res) => {
          carList = res.getElementsByTagName("item");
          for (let i = 0; i < carList.length; i++) {
            let carItem = {};
            for (let j = 0; j < carList[i].children.length; j++) {
              carItem[carList[i].children[j].nodeName] = carList[i].children[j].innerHTML
            }
            carData.push(carItem);
          }
      }
  })
};

const createHTML = (item, index) => {
  const carID = item['id'];
  const carCategory = item['Category']
  const carAvailability = item['Availability']
  const carBrand = item['Brand']
  const carDescription = item['Description']
  const carFuelType = item['FuelType']
  const carMileage = item['Mileage']
  const carModel = item['Model']
  const carPricePerDay = parseInt(item['PricePerDay'])
  const carSeats = item['Seats']
  const carYear = item['Year']

  html = `
  <div id='${carID}' class="col-4">
    <br>
    <img src='./images/${carModel}.jpg' height='150' width='200'>
    <br>
    <h5>${carBrand}-${carModel}-${carYear}</h5>
    <span>
      <span><strong>Mileage:</strong></span>
      <span>${carMileage}</span>
    </span>
    <br>
    <span>
      <span><strong>Fuel type:</strong></span>
      <span>${carFuelType}</span>
    </span>
    <br>
    <span>
      <span><strong>Seats:</strong></span>
      <span>${carSeats}</span>
    </span>
    <br>
    <span>
      <span><strong>Price per day:</strong></span>
      <span>${carPricePerDay}</span>
    </span>
    <br>
    <span>
      <span><strong>Availability:</strong></span>
      <span>${carAvailability}</span>
    </span>
    <br>
    <span>
      <span><strong>Description:</strong></span>
      <span>${carDescription}</span>
    </span>
    <br><br>
    <button class='btn btn-primary' onClick='onAddCar(${carID})'>Add to cart</button>
  </div>
  `

  $('#cars').append(html)
};

const onAddCar = id => {
  console.log(id)
}

$(document).ready(() => {
  getCars().then(() => {
    carData.forEach(createHTML);
  });
});
