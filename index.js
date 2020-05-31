let carData = [];

const getCars = async () => {
  await $.ajax({
    method: "GET",
    url: "./db/cars.xml",
    success: (res) => {
      carList = res.getElementsByTagName("item");
      for (let i = 0; i < carList.length; i++) {
        let carItem = {};
        for (let j = 0; j < carList[i].children.length; j++) {
          carItem[carList[i].children[j].nodeName] =
            carList[i].children[j].innerHTML;
        }
        carData.push(carItem);
      }
    },
  });
};

const createHTML = (item, index) => {
  const carID = item["id"];
  const carCategory = item["Category"];
  const carAvailability = item["Availability"];
  const carBrand = item["Brand"];
  const carDescription = item["Description"];
  const carFuelType = item["FuelType"];
  const carMileage = item["Mileage"];
  const carModel = item["Model"];
  const carPricePerDay = parseInt(item["PricePerDay"]);
  const carSeats = item["Seats"];
  const carYear = item["Year"];

  html = `
  <div id='${carID}' class="col-4 border">
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
    <span style="    display:block;
    white-space: nowrap;
    overflow: hidden;
    text-overflow: ellipsis;">
      <span><strong>Description:</strong></span>
      <span>${carDescription}</span>
    </span>
    <br>
    <button class='btn btn-primary' onClick='onAddCar(${carID})'>Add to cart</button>
    <br><br>
  </div>
  `;

  $("#cars").append(html);
};

const onAddCar = (id) => {
  index = id - 1000;
  if (carData[index]["Availability"] == "Y") {
    $.ajax({
      method: "POST",
      url: "./addCar.php",
      data: carData[index],
      success: (res) => {
        alert(res);
        if (res == "Add to the cart successfully") {
          location.href = "index.php";
        }
      },
    });
  } else {
    alert("Sorry, the car is not available now. Please try other cars");
  }
};

const checkCart = (empty) => {
  if (empty) {
    alert("No car has been reserved.");
    return false;
  } else {
    location.href = "cart.php";
    return true;
  }
};

$(document).ready(() => {
  getCars().then(() => {
    carData.forEach(createHTML);
  });
});
