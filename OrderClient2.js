import React, {Component} from "react";
import axios from "axios";
import $ from "jquery";
import Modal from "../component/Modal";
import Toast from "../component/Toast";
import { Link } from 'react-router-dom';
import OrderClient from "./OrderClient";

class OrderClient2 extends Component {
  constructor(props){
      super(props);
      this.state = {
          products: [],
          find: "",
          filter:""
      }

        //jika tidak terdapat data token pada lokal storage
        // if(!localStorage.getItem("Token")){
        //     // direct ke halaman login
        //     window.location = "/login";
        // }
    }
    bind = (event) => {
        this.setState({[event.target.name] : event.target.value});
    }

    GetProducts = () => {
            let url = "http://localhost/toko_online/public/products"
            axios.get(url)
            .then(res => {
                this.setState({products: res.data.products})
            })
            .catch(error => {
                console.log(error)
            })
        }


    componentDidMount = () => {
      this.GetProducts();

    }
    Search = (event) => {
        if (event.keyCode === 13 ){
            // $("#loading").toast("show");
            let url = "http://localhost/toko_online/public/products";
            let form = new FormData();
            form.append("find",this.state.find);
            axios.post(url,form)
            .then(response => {
                $("#loading").toast("hide");
                this.setState({products: response.data.products});
            })
            .catch(error => {
                console.log(error);
            });
        }
    }
    render() {
      const renderData = this.state.products.map((item, id)=>{
            return (
                <OrderClient item={item} key={id}/>
            )
        })
return (
<div className=" container">

<div className="row">
                <div className="col-lg-3">
                    <h1 className="my-4">StatusPesanan</h1>
                </div>

                    <div className="row">
                        {renderData}

                    </div>
                </div>
            </div>


      );
  }
}

export default OrderClient2
