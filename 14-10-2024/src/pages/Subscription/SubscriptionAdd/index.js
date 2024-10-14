import React, { useEffect, useState } from 'react';
import axios from 'axios';
import AdminLayout from '../../../layouts/AdminLayout';
import { useNavigate } from 'react-router-dom';
import { useParams } from "react-router-dom";

function SubscriptionAdd() {
    const [inputs, setInputs] = useState({
        id: '', name: '', email: '', zone_id: '', address: '', contact: '', alt_contact: '',
    });
    const navigate = useNavigate();
    const { id } = useParams();

    function getDatas() {
        axios.get(`${process.env.REACT_APP_API_URL}/subscription/${id}`).then(function (response) {
            setInputs(response.data.data);
        });
    }

    useEffect(() => {
        if (id) {
            getDatas();
        }
    }, []);

    const handleChange = (event) => {
        const name = event.target.name;
        const value = event.target.value;
        setInputs(values => ({ ...values, [name]: value }));
    }

    const handleSubmit = async (e) => {
        e.preventDefault();
        console.log(inputs)

        try {
            let apiurl = '';
            if (inputs.id != '') {
                apiurl = `/subscription/${inputs.id}`;
            } else {
                apiurl = `/subscription/create`;
            }

            let response = await axios({
                method: 'post',
                responsiveTYpe: 'json',
                url: `${process.env.REACT_APP_API_URL}${apiurl}`,
                data: inputs
            });
            navigate('/subscription')
        }
        catch (e) {
            console.log(e);
        }
    }
    return (
        <AdminLayout>
            <div className="main-content container-fluid">
                <div className="page-title">
                    <div className="row">
                        <div className="col-12 col-md-6 order-md-1 order-last">
                            <h3>Add New Subscription</h3>
                        </div>
                        <div className="col-12 col-md-6 order-md-2 order-first">
                            <nav aria-label="breadcrumb" className='breadcrumb-header'>
                                <ol className="breadcrumb">
                                    <li className="breadcrumb-item"><a href="index.html">Subscription</a></li>
                                    <li className="breadcrumb-item active" aria-current="page">Add New</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>

                <section id="basic-vertical-layouts">
                    <div className="row match-height">
                        <div className="col-12">
                            <div className="card">
                                <div className="card-content">
                                    <div className="card-body">
                                        <form className="form form-vertical" onSubmit={handleSubmit}>
                                            <div className="form-body">
                                                <div className="row">
                                                    <div className="col-12">
                                                        <div className="form-group">
                                                            <label for="first-name-vertical">Name</label>
                                                            <input type="text" id="first-name-vertical" className="form-control" defaultValue={inputs.name} name="name" onChange={handleChange} placeholder="Full Name" />
                                                        </div>
                                                    </div>
                                                    <div className="col-12">
                                                        <div className="form-group">
                                                            <label for="email-id-vertical">Email</label>
                                                            <input type="text" id="email-id-vertical" className="form-control" defaultValue={inputs.email} name="email" onChange={handleChange} placeholder="Email" />
                                                        </div>
                                                    </div>
                                                    <div className="col-12">
                                                        <div className="form-group">
                                                            <label for="email-id-vertical">Zone_Id</label>
                                                            <input type="text" id="email-id-vertical" className="form-control" defaultValue={inputs.zone_id} name="zone_id" onChange={handleChange} placeholder="Zone_Id" />
                                                        </div>
                                                    </div>

                                                    <div className="col-12">
                                                        <div className="form-group">
                                                            <label for="email-id-vertical">Address</label>
                                                            <input type="text" id="email-id-vertical" className="form-control" defaultValue={inputs.address} name="address" onChange={handleChange} placeholder="Address" />
                                                        </div>
                                                    </div>

                                                    <div className="col-12">
                                                        <div className="form-group">
                                                            <label for="email-id-vertical">Contact</label>
                                                            <input type="text" id="email-id-vertical" className="form-control" defaultValue={inputs.contact} name="contact" onChange={handleChange} placeholder="Contact" />
                                                        </div>
                                                    </div>

                                                    <div className="col-12">
                                                        <div className="form-group">
                                                            <label for="email-id-vertical">Alt_Contact</label>
                                                            <input type="text" id="email-id-vertical" className="form-control" defaultValue={inputs.alt_contact} name="alt_contact" onChange={handleChange} placeholder="Alt-Contact" />
                                                        </div>
                                                    </div>

                                                    <div className="col-12 d-flex justify-content-end">
                                                        <button type="submit" className="btn btn-primary mr-1 mb-1">Submit</button>
                                                        <button type="reset" className="btn btn-light-secondary mr-1 mb-1">Reset</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>

        </AdminLayout>
    )
}

export default SubscriptionAdd