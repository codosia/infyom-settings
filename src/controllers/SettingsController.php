<?php

namespace Codosia\InfyomSettings\controllers;

use Codosia\InfyomSettings\requests\CreateSettingsRequest;
use Codosia\InfyomSettings\requests\UpdateSettingsRequest;
use App\Http\Controllers\AppBaseController;
use Codosia\InfyomSettings\models\Settings;
use Illuminate\Http\Request;
use Flash;
use Response;

use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Storage;

class SettingsController extends AppBaseController
{
    /**
     * Display a listing of the Settings.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        /** @var Settings $settings */
        $settings = Settings::all();

        return view('InfyomSettings::index')
            ->with('settings', $settings);
    }

    /**
     * Show the form for creating a new Settings.
     *
     * @return Response
     */
    public function create()
    {
        return view('InfyomSettings::create');
    }

    /**
     * Store a newly created Settings in storage.
     *
     * @param CreateSettingsRequest $request
     *
     * @return Response
     */
    public function store(CreateSettingsRequest $request)
    {
        $input = $request->all();

        // validate duplicate key
        $validator = Validator::make($input, [
            'key' => [
                Rule::unique('settings'),
            ],
        ]);
        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        if( $input['type'] == 'File' ){

            if( !$request->hasFile('value') || !$request->file('value')->isValid() ){
                return back()->withErrors(['value' => ['Invalid file!']]);
            }

            $path = $request->value->store('public/settings');
            $input['value'] = $path;
        }

        /** @var Settings $settings */
        $settings = Settings::create($input);

        Flash::success(__('InfyomSettings::messages.saved', ['model' => __('InfyomSettings::settings.singular')]));

        return redirect(route('settings.index'));
    }

    /**
     * Display the specified Settings.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Settings $settings */
        $settings = Settings::find($id);

        if (empty($settings)) {
            Flash::error(__('InfyomSettings::settings.singular').' '.__('InfyomSettings::messages.not_found'));

            return redirect(route('settings.index'));
        }

        return view('InfyomSettings::show')->with('settings', $settings);
    }

    /**
     * Show the form for editing the specified Settings.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        /** @var Settings $settings */
        $settings = Settings::find($id);

        if (empty($settings)) {
            Flash::error(__('InfyomSettings::messages.not_found', ['model' => __('InfyomSettings::settings.singular')]));

            return redirect(route('settings.index'));
        }

        return view('InfyomSettings::edit')->with('settings', $settings);
    }

    /**
     * Update the specified Settings in storage.
     *
     * @param int $id
     * @param UpdateSettingsRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateSettingsRequest $request)
    {
        /** @var Settings $settings */
        $settings = Settings::find($id);

        if (empty($settings)) {
            Flash::error(__('InfyomSettings::messages.not_found', ['model' => __('InfyomSettings::settings.singular')]));

            return redirect(route('settings.index'));
        }

        $input = $request->all();

        // validate duplicate key
        $validator = Validator::make($input, [
            'key' => [
                Rule::unique('settings')->ignore($settings->id),
            ],
        ]);
        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        if( $input['type'] == 'File' ){

            if( $request->hasFile('value') && $request->file('value')->isValid() ){
                $path = $request->value->store('public/settings');
                $input['value'] = $path;

            }else{
                unset($input['value']);
            }            
        }

        $settings->fill($input);
        $settings->save();

        Flash::success(__('InfyomSettings::messages.updated', ['model' => __('InfyomSettings::settings.singular')]));

        return redirect(route('settings.index'));
    }

    /**
     * Remove the specified Settings from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Settings $settings */
        $settings = Settings::find($id);

        if (empty($settings)) {
            Flash::error(__('InfyomSettings::messages.not_found', ['model' => __('InfyomSettings::settings.singular')]));

            return redirect(route('settings.index'));
        }

        if( $settings->type == 'File' && Storage::exists($settings->value) ){
            Storage::delete($settings->value);
        }
        $settings->delete();

        Flash::success(__('InfyomSettings::messages.deleted', ['model' => __('InfyomSettings::settings.singular')]));

        return redirect(route('settings.index'));
    }
}
