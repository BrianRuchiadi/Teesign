<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class JenisUserModel extends Model
{
  protected $primaryKey = 'id';
  protected $table = 'jenis_users';
  public $timestamps = false;
    // Tells Eloquent ORM Model not to consider created_at and updated_at table fields.
    // String jenis
    // String keterangan
    // Boolean aktif
    
    /* GET ALL DATA 
     * 
    // Get all data()
    // JenisUserModel::all()
     * 
       End of how to get all data */
    
    /* HOW SPECIFIED DATA
     * 
     * Get specific data()
     * JenisUserModel::where('field','field_value')->orderBy('field', 'desc|asc')->take(x)->get();
     * or
     * JenisUserModel::find([1,2,3]);
     * take is for specifying limit
     * 
       End of how to get a specified data */
    
    /* GET SINGLE DATA/MODELS/ AGGREGATE
     * 
     * JenisUserModel::find(1)
     * or
     * JenisUserModel::where('field','field_value')->first();
     */
    
    /* NOT FOUND EXCEPTIONS
     * 
     * JenisUserModel::findofFail(identifier);
     * or
     * JenisUserModel::where('field','>',field_value')->firstorFail()
     */
    
    /* RETRIEVING AGGREGATES
     * 
     * (Useful for functions such as COUNT, SUM, MAX, MIN, AVG)
     * 
     * JenisUserModel::where('field', 'field_value')->count();
     * JenisUserModel::where('field', 'field_value')->max('field');
     * 
     */
    
    /* INSERTING NEW RECORD
     * 
     * in Controller
     * 
     * public function store(Request $request){
     *      $jenisUserInsert = new JenisUserModel;
     *      $jenisUserInsert->field_name = $request->field_name;
     *      $jenisUserInsert->save();
     * }
     */
    
    /* UPDATING NEW RECORD
     * 
     * $jenisUserModel = JenisUserModel::find(value);
     * $jenisUserModel->field_name = new_value;
     * $jenisUserModel->save();
     */
    
    /* MASS UPDATES
     * 
     * JenisUserModel::where('field_name', 'field_value')-> where('field_name_2', 'field_value_2')->update(['field' => field_value]);
     * 
     * When Issuing a mass update via Eloquent, the saved and updated model events will not
     * be fired for updated models. This is because the modesls are actually never actually 
     * retrieved when issuing a mass update
     */
    
    /* MASS ASSIGNMENT
     * 
     * It is possible to use create method to save a new model in
     * a single line. The inserted model instance will be returned
     * from the method. 
     * 
     * However before doing so, we will have to specify either 
     * a fillable or guarded attribute on the model as all 
     * Eloquent models protect against mass-assignment by default
     * 
     * fillable means mass assignable
     * guarded means not mass assignable or black listed
     * 
     * e.g.
     * 
     * class A extends Model
     * {
     *      protected $fillable = ['name'];
     *      protected $guarded = ['admin_id'];
     *      // protected $guarded = []; to define no black listed
     * 
     * }
     */
    
    
    /* OTHER CREATION METHOD
     * 
     * firstOrCreate / firstOrNew
     * 
     * firstOrCreate : locate the data given a column, and if not 
     *                  found, then  a record will be inserted
     * firstOrNew : locate the data given a column, and if not 
     *              found, a new model instance will be returned.
     *              the model returned has yet been persisted, 
     *              therefore, save() will need to be called
     * 
     * updateorCreate : locate the data given the attributes, and if model
     *                  found, update it, else create new record
     */
    
    /* DELETING MODELS
     * 
     * $model = JenisUserModel::find(identifier);
     * $model->delete();
     * 
     * If the identifier is know beforehand, then
     * 
     * JenisUserModel::destroy(1);
     * JenisUserModel::destroy([1,2,3]);
     * JenisUserModel::destroy(1,2,3);
     * 
     * DELETING MODELS BY QUERY
     * 
     * $deletedRows = JenisUserModel::where('field_name', field_value)->delete()
     * 
     * (This statement will delete all the records where the query expressions 
     *  are satisfied)
     */
}
