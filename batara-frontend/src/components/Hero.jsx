import React from "react";

const Hero = () => {
  return (
    <section className="hero-section">
      <div className="container">
        <div className="row align-items-center">

          <div className="col-lg-6">
            <div className="hero-badge">
              🌿 Platform Produk Desa Indonesia
            </div>

            <h1 className="hero-title">
              Temukan Produk <em>Asli Desa</em>
            </h1>

            <p className="hero-desc">
              Belanja langsung dari BUMDes seluruh Indonesia.
            </p>

            <div className="hero-cta">
              <button className="btn-hero-primary">
                Belanja Sekarang
              </button>
            </div>
          </div>

          <div className="col-lg-6">
            <img
              src="https://images.unsplash.com/photo-1558618666-fcd25c85cd64"
              className="img-fluid"
            />
          </div>

        </div>
      </div>
    </section>
  );
};

export default Hero;