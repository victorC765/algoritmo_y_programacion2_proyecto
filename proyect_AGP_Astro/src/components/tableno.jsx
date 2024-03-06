import "../styles/tableno.css" ;
import { useState } from "react";
import {Table,Button, Modal, ModalHeader, ModalBody, ModalFooter } from "reactstrap";

export default function Tableno(args){
    const [modal, setModal] = useState(false);

    const toggle = () => setModal(!modal);
    return (
       
<main>
<Table>
    <thead>
    <tr className="table-dark">
       <th>Nombres</th>
       <th>Apellidos</th>
       <th>cedula</th>
       <th>Promedio</th>
       </tr>
    </thead>
    <tbody>
        <tr>
       <td>victor</td>
       <td>Cardona</td>
       <td>30700323</td>
       <td></td>
       </tr>
    </tbody>
</Table>
<div>
      <Button color="danger" onClick={toggle}>
        Click Me
      </Button>
      <Modal isOpen={modal} toggle={toggle} {...args}>
        <ModalHeader toggle={toggle}>Modal title</ModalHeader>
        <ModalBody>
         
        </ModalBody>
        <ModalFooter>
          <Button color="primary" onClick={toggle}>
            Do Something
          </Button>{' '}
          <Button color="secondary" onClick={toggle}>
            Cancel
          </Button>
        </ModalFooter>
      </Modal>
    </div>
</main>
    )
}

