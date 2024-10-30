<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BillingAddresses;
use Illuminate\Support\Facades\Auth;

class DireccionesFacturacionController extends Controller
{
    // Añadir una dirección
    public function store(Request $request) {
        $data = $request->validate([
            'idUser' => 'required',
            'phone_number' => 'required',
            'zip_code' => 'required',
            'population' => 'required',
            'city' => 'required',
            'street' => 'required',
            'number' => 'required'
        ],
        [
            'idUser.required' => 'The idUser field is required',
            'phone_number.required' => 'The idUser field is required',
            'zip_code.required' => 'The zip_code field is required',
            'population.required' => 'The population field is required',
            'city.required' => 'The city field is required',
            'street.required' => 'The street field is required',
            'number.required' => 'The number field is required'
        ]);

        $checkShippingAddressess = BillingAddresses::where('idUser', $data['idUser'])->get();
        $direccion = new BillingAddresses();
        if($checkShippingAddressess->isEmpty()) $direccion->default = true;

        $direccion->idUser = $data['idUser'];
        $direccion->name = $data['name'];
        $direccion->last_name = $data['last_name'];
        $direccion->company = $data['company'];
        $direccion->phone_number = $data['phone_number'];
        $direccion->dni_nie = $data['dni_nie'];
        $direccion->cif = $data['cif'];
        $direccion->zip_code = $data['zip_code'];
        $direccion->population = $data['population'];
        $direccion->city = $data['city'];
        $direccion->street = $data['street'];
        $direccion->number = $data['number'];
        $direccion->floor = $request->floor ?? null;
        $direccion->door = $request->door ?? null;
        $direccion->save();

        return response()->json([
            'status' => 'success',
            'message' => 'Address created successfully',
            'action' => 'Added a new shipping address for the user',
            'data' => $direccion  // Devuelve el objeto creado en JSON
        ]);
    }

    // Eliminar dirección
    public function delete($id) {
        try {
            $direccion = BillingAddresses::findOrFail($id);
            $direccion->delete();

            return response()->json([
                'status' => 'success',
                'message' => 'Address deleted successfully',
                'action' => 'Deleted the specified shipping address',
                'data' => $direccion  // Devuelve el objeto eliminado en JSON
            ], 200);
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'Address not found',
                'action' => 'Attempted to delete a non-existent shipping address',
                'data' => null
            ], 404);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'An error occurred while deleting the address',
                'action' => 'Failed to delete the shipping address due to an unexpected error',
                'data' => null
            ], 500);
        }
    }

    // Modificar dirección
    public function update($id, Request $request) {
        $data = $request->validate([
            'idUser' => 'required',
            'phone_number' => 'required',
            'zip_code' => 'required',
            'population' => 'required',
            'city' => 'required',
            'street' => 'required',
            'number' => 'required'
        ],
        [
            'idUser.required' => 'The idUser field is required',
            'phone_number.required' => 'The idUser field is required',
            'zip_code.required' => 'The zip_code field is required',
            'population.required' => 'The population field is required',
            'city.required' => 'The city field is required',
            'street.required' => 'The street field is required',
            'number.required' => 'The number field is required'
        ]);

        $direccion = BillingAddresses::findOrFail($id);
        $direccion->idUser = $data['idUser'];
        $direccion->name = $data['name'];
        $direccion->last_name = $data['last_name'];
        $direccion->company = $data['company'];
        $direccion->phone_number = $data['phone_number'];
        $direccion->dni_nie = $data['dni_nie'];
        $direccion->cif = $data['cif'];
        $direccion->zip_code = $data['zip_code'];
        $direccion->population = $data['population'];
        $direccion->city = $data['city'];
        $direccion->street = $data['street'];
        $direccion->number = $data['number'];
        $direccion->floor = $request->floor ?? null;
        $direccion->door = $request->door ?? null;
        $direccion->save();

        return response()->json([
            'status' => 'success',
            'message' => 'Address updated successfully',
            'action' => 'Updated the details of an existing shipping address',
            'data' => $direccion  // Devuelve el objeto actualizado en JSON
        ]);
    }

    public function updateDefault(Request $request)
    {
        try {
            $data = $request->validate([
                'idUser' => 'required',
                'id' => 'required'
            ], [
                'idUser.required' => 'The idUser field is required',
                'id.required' => 'The id field is required'
            ]);

            // Buscar la dirección de envío actual por defecto y actualizarla
            $oldDefaultBillingAddresses = BillingAddresses::where('idUser', $data['idUser'])
                ->where('default', true)
                ->first();

            if ($oldDefaultBillingAddresses) {
                $oldDefaultBillingAddresses->default = false;
                $oldDefaultBillingAddresses->save();
            }

            // Establecer la nueva dirección como predeterminada
            $billingAddresses = BillingAddresses::findOrFail($data['id']);
            $billingAddresses->default = true;
            $billingAddresses->save();

            $billingAddresses = BillingAddresses::all();

            return response()->json([
                'status' => 'success',
                'message' => 'Address default updated successfully',
                'action' => 'Updated the default shipping address',
                'billingAddresses' => $billingAddresses
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'Failed to update default address',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    // Listar direcciones
    public function list() {
        $direcciones = BillingAddresses::all();

        return response()->json([
            'status' => 'successful',
            'message' => 'Addresses listed successfully',
            'action' => 'Listed all available shipping addresses',
            'data' => $direcciones  // Devuelve todas las direcciones en JSON
        ]);
    }

    public function getAddressesBulling()
    {
        $billingAddresses = BillingAddresses::where('idUser', Auth::user()->id)->get();

        return $billingAddresses;
    }
}
