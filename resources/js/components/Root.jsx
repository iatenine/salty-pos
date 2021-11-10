import React from "react";
import ReactDOM from "react-dom";
import { Dashboard } from "./dashboard";
import { Pos } from "./pos";
import { BrowserRouter, Routes, Route, Link } from "react-router-dom";

function Root() {
    return (
        <>
            <BrowserRouter>
                <Routes>
                    <Route exact path="/" element={<Dashboard />} />
                    <Route path="/pos" element={<Pos />} />
                    {/* <Route path="/pos" element={<POS />} /> */}
                </Routes>
                <nav>
                    <ul>
                        <li>
                            <Link to="/">Dashboard</Link>
                        </li>
                        <li>
                            <Link to="/pos">POS</Link>
                        </li>
                    </ul>
                </nav>
            </BrowserRouter>
        </>
    );
}

export default Root;

if (document.getElementById("root")) {
    ReactDOM.render(<Root />, document.getElementById("root"));
}
