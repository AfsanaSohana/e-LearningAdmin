import React, { useEffect, useState } from 'react';
import axios from 'axios';
import AdminLayout from '../../../layouts/AdminLayout';
import { useNavigate } from 'react-router-dom';
import { useParams } from "react-router-dom";

function FlightAdd() {
    const [inputs, setInputs] = useState({
        id: '', airline_id: '', class: '', trip_type: '', person: '', departure_place: '', arrival_place: '', departure_time: '', arrival_time: '', transit_time: '', is_complementary_food: '', baggage_allowance: '',
    });
    const navigate = useNavigate();
    const { id } = useParams();

    function getDatas() {
        axios.get(`${process.env.REACT_APP_API_URL}/flight/${id}`).then(function (response) {
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
                apiurl = `/flight/edit/${inputs.id}`;
            } else {
                apiurl = `/flight/create`;
            }

            let response = await axios({
                method: 'post',
                responsiveTYpe: 'json',
                url: `${process.env.REACT_APP_API_URL}${apiurl}`,
                data: inputs
            });
            navigate('/flight')
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
                            <h3>Add New Flight</h3>
                        </div>
                        <div className="col-12 col-md-6 order-md-2 order-first">
                            <nav aria-label="breadcrumb" className='breadcrumb-header'>
                                <ol className="breadcrumb">
                                    <li className="breadcrumb-item"><a href="index.html">Flight</a></li>
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
                                                            <label for="first-name-vertical">Airline_phId</label>
                                                            <input type="text" id="first-name-vertical" className="form-control" defaultValue={inputs.airline_id} name="airline_id" onChange={handleChange} placeholder="Airline_Id" />
                                                        </div>
                                                    </div>
                                                    <div className="col-12">
                                                        <div className="form-group">
                                                            <label for="email-id-vertical">Class</label>
                                                            <input type="text" id="email-id-vertical" className="form-control" defaultValue={inputs.class} name="class" onChange={handleChange} placeholder="Class" />
                                                        </div>
                                                    </div>

                                                    <div className="col-12">
                                                        <div className="form-group">
                                                            <label for="email-id-vertical">Trip_Type</label>
                                                            <input type="text" id="email-id-vertical" className="form-control" defaultValue={inputs.trip_type} name="trip_type" onChange={handleChange} placeholder="Trip_Type" />
                                                        </div>
                                                    </div>
                                                    <div className="col-12">
                                                        <div className="form-group">
                                                            <label for="email-id-vertical">Person</label>
                                                            <input type="text" id="email-id-vertical" className="form-control" defaultValue={inputs.person} name="person" onChange={handleChange} placeholder="Person" />
                                                        </div>
                                                    </div>
                                                    <div className="col-12">
                                                        <div className="form-group">
                                                            <label for="email-id-vertical">Departure_Place</label>
                                                            <input type="text" id="email-id-vertical" className="form-control" defaultValue={inputs.departure_place} name="departure_place" onChange={handleChange} placeholder="Departure_Place" />
                                                        </div>
                                                    </div>
                                                    <div className="col-12">
                                                        <div className="form-group">
                                                            <label for="email-id-vertical">Arrival_Place</label>
                                                            <input type="text" id="email-id-vertical" className="form-control" defaultValue={inputs.arrival_place} name="arrival_place" onChange={handleChange} placeholder="Arrival_Place" />
                                                        </div>
                                                    </div>

                                                    <div className="col-12">
                                                        <div className="form-group">
                                                            <label for="email-id-vertical">Departure_Time</label>
                                                            <input type="text" id="email-id-vertical" className="form-control" defaultValue={inputs.departure_time} name="departure_time" onChange={handleChange} placeholder="Departure_Time" />
                                                        </div>
                                                    </div>

                                                    <div className="col-12">
                                                        <div className="form-group">
                                                            <label for="email-id-vertical">Arrival_Time</label>
                                                            <input type="text" id="email-id-vertical" className="form-control" defaultValue={inputs.arrival_time} name="arrival_time" onChange={handleChange} placeholder="Arrival_Time" />
                                                        </div>
                                                    </div>

                                                    <div className="col-12">
                                                        <div className="form-group">
                                                            <label for="email-id-vertical">Transit_Time</label>
                                                            <input type="text" id="email-id-vertical" className="form-control" defaultValue={inputs.transit_time} name="transit_time" onChange={handleChange} placeholder="Transit_Time" />
                                                        </div>
                                                    </div>

                                                    <div className="col-12">
                                                        <div className="form-group">
                                                            <label for="email-id-vertical">Is_Complementary_Food</label>
                                                            <input type="text" id="email-id-vertical" className="form-control" defaultValue={inputs.is_complementary_food} name="is_complementary_food" onChange={handleChange} placeholder="Is_Complementary_Food" />
                                                        </div>
                                                    </div>

                                                    <div className="col-12">
                                                        <div className="form-group">
                                                            <label for="email-id-vertical">Baggage_Allowance</label>
                                                            <input type="text" id="email-id-vertical" className="form-control" defaultValue={inputs.baggage_allowance} name="baggage_allowance" onChange={handleChange} placeholder="Baggage_Allowance" />
                                                        </div>
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

export default FlightAdd