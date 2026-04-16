import React from "react";

const ProductCard = ({ product }) => {
  const handleClick = () => {
    console.log("Go to detail:", product.id);
  };

  const addToCart = (e) => {
    e.stopPropagation();
    console.log("Add to cart:", product.id);
  };

  return (
    <div className="col">
      <div className="product-card" onClick={handleClick}>
        <div className="product-img-wrap">
          <img src={product.image} alt={product.name} />

          <div className="product-actions">
            <button onClick={addToCart} className="btn-cart">
              🛒 Keranjang
            </button>
            <button className="btn-buy">Beli</button>
          </div>
        </div>

        <div className="product-info">
          <div className="product-name">{product.name}</div>
          <span className="product-price">
            Rp {product.price.toLocaleString()}
          </span>
        </div>
      </div>
    </div>
  );
};

export default ProductCard;