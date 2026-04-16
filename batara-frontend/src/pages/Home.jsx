import React, { useEffect, useState } from "react";
import Hero from "../components/Hero";
import ProductCard from "../components/ProductCard";

const Home = () => {
  const [products, setProducts] = useState([]);

  useEffect(() => {
    fetch("http://127.0.0.1:8000/api/produk")
      .then(res => res.json())
      .then(data => {
        setProducts(data);
      })
      .catch(err => console.log(err));
  }, []);

  return (
    <>
      <Hero />

      {/* PRODUK */}
      <section className="products-section">
        <div className="container">
          <h2>Produk Terlaris</h2>

          <div className="row">
            {products.map((p) => (
              <ProductCard key={p.id_produk} product={p} />
            ))}
          </div>
        </div>
      </section>
    </>
  );
};

export default Home;