import React, { useEffect, useState } from 'react';
import axios from 'axios';
import AdminLayout from '../../../layouts/AdminLayout';
import { useNavigate } from 'react-router-dom';
import { useParams } from "react-router-dom";

function RoomtypeAdd() {
    const [inputs, setInputs] = useState({
        id: '', hotel_id: '', qty: '', bedtype: '', facilities: '', is_ac: '', is_tv: '', roomfare: '', number_of_guest: '',

    });
    const navigate = useNavigate();
    const { id } = useParams();

    function getDatas() {
        axios.get(`${process.env.REACT_APP_API_URL}/roomtype/${id}`).then(function (response) {
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
                apiurl = `/roomtype/${inputs.id}`;
            } else {
                apiurl = `/roomtype/create`;
            }

            let response = await axios({
                method: 'post',
                responsiveTYpe: 'json',
                url: `${process.env.REACT_APP_API_URL}${apiurl}`,
                data: inputs
            });
            navigate('/roomtype')
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
                            <h3>Add New Roomtyp</h3>
                        </div>
                        <div className="col-12 col-md-6 order-md-2 order-first">
                            <nav aria-label="breadcrumb" className='breadcrumb-header'>
                                <ol className="breadcrumb">
                                    <li className="breadcrumb-item"><a href="index.html">Roomtype</a></li>
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
                                                            <label for="email-id-vertical">Hotel_Id</label>
                                                            <input type="text" id="email-id-vertical" className="form-control" defaultValue={inputs.hotel_id} name="hotel_id" onChange={handleChange} placeholder="Hotel_Id" />
                                                        </div>
                                                    </div>
                                                    <div className="col-12">
                                                        <div className="form-group">
                                                            <label for="email-id-vertical">Qty</label>
                                                            <input type="text" id="email-id-vertical" className="form-control" defaultValue={inputs.qty} name="qty" onChange={handleChange} placeholder="Qty" />
                                                        </div>
                                                    </div>
                                                    <div className="col-12">
                                                        <div className="form-group">
                                                            <label for="email-id-vertical">Bedtype</label>
                                                            <input type="text" id="email-id-vertical" className="form-control" defaultValue={inputs.bedtype} name="bedtype" onChange={handleChange} placeholder="Bedtype" />
                                                        </div>
                                                    </div>
                                                    <div className="col-12">
                                                        <div className="form-group">
                                                            <label for="email-id-vertical">Facilities</label>
                                                            <input type="text" id="email-id-vertical" className="form-control" defaultValue={inputs.facilities} name="facilities" onChange={handleChange} placeholder="Facilities" />
                                                        </div>
                                                    </div>

                                                    <div className="col-12">
                                                        <div className="form-group">
                                                            <label for="email-id-vertical">Is_AC</label>
                                                            <input type="text" id="email-id-vertical" className="form-control" defaultValue={inputs.is_ac} name="is_ac" onChange={handleChange} placeholder="Is_ac" />
                                                        </div>
                                                    </div>

                                                    <div className="col-12">
                                                        <div className="form-group">
                                                            <label for="email-id-vertical">is_TV</label>
                                                            <input type="text" id="email-id-vertical" className="form-control" defaultValue={inputs.is_tv} name="is_tv" onChange={handleChange} placeholder="is_TV" />
                                                        </div>
                                                    </div>

                                                    <div className="col-12">
                                                        <div className="form-group">
                                                            <label for="email-id-vertical">Roomfare</label>
                                                            <input type="text" id="email-id-vertical" className="form-control" defaultValue={inputs.roomfare} name="roomfare" onChange={handleChange} placeholder="Roomfare" />
                                                        </div>
                                                    </div>

                                                    <div className="col-12">
                                                        <div className="form-group">
                                                            <label for="email-id-vertical">Number_Of_Guest	</label>
                                                            <input type="text" id="email-id-vertical" className="form-control" defaultValue={inputs.number_of_guest} name="number_of_guest" onChange={handleChange} placeholder="Number_of_guest" />
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

export default RoomtypeAdd