function getId() {
  return event.srcElement.id;
}

$("document").ready(function() {
  $.ajax({
    url: "/cart/displaycart",
    method: "GET",
    success: function(result) {
      var res = JSON.parse(result);
      $("#cart").append(
        "<tr><th>Product</th><th>Price</th><th>Quantity</th><th>Action</th></tr>"
      );
      for (var key in res) {
        $("#cart").append(
          "<tr><td>" +
            res[key]["productName"] +
            "</td><td>" +
            res[key]["price"] +
            "</td><td>" +
            res[key]["quantity"] +
            "</td><td><a href='/cart/deleteitem?id="+res[key]["id"]+"'>Delete</a></td></tr>"
        );
      }
    }
  });

  $(".addtocart").click(function() {
    $.ajax({
      url: "/cart/addtocart",
      method: "GET",
      data: {
        id: getId()
      },
      success: function(result) {
          var result = JSON.parse(result);
        $("#cart").append(
            "<tr><td>" +
              result[0]["productName"] +
              "</td><td>" +
              result[0]["price"] +
              "</td><td>" +
              result[0]["quantity"] +
              "</td><td><a href=''>Delete</a></td></tr>"
          )
      }
    });
  });
});
