/**
 * Retrieves the translation of text.
 *
 * @see https://developer.wordpress.org/block-editor/reference-guides/packages/packages-i18n/
 */
import { __ } from '@wordpress/i18n';

/**
 * React hook that is used to mark the block wrapper element.
 * It provides all the necessary props like the class name.
 *
 * @see https://developer.wordpress.org/block-editor/reference-guides/packages/packages-block-editor/#useblockprops
 */
import { InspectorControls, useBlockProps, RichText, InnerBlocks } from '@wordpress/block-editor';
import { PanelBody, TextControl, SelectControl, FormTokenField, Spinner} from '@wordpress/components';
import { useSelect } from '@wordpress/data';

/**
 * Lets webpack process CSS, SASS or SCSS files referenced in JavaScript files.
 * Those files can contain any CSS code that gets applied to the editor.
 *
 * @see https://www.npmjs.com/package/@wordpress/scripts#using-css
 */
import './editor.scss';


// беремо enum прямо з block.json
import metadata from './block.json';


/**
 * The edit function describes the structure of your block in the context of the
 * editor. This represents what the editor will render when the block is used.
 *
 * @see https://developer.wordpress.org/block-editor/reference-guides/block-api/block-edit-save/#edit
 *
 * @return {Element} Element to render.
 */
export default function Edit({ attributes, setAttributes }) {

	const { anchorId, bloсkZindex, topRadius, backgroundType, blockTitle, postsList, topIndent, bottomIndent } = attributes;

	const blockProps = useBlockProps({
		className: topIndent + ' ' + bottomIndent
	});

	// Отримуємо enum bottomIndent з block.json
	const bottomIndentOptions = metadata.attributes.bottomIndent.enum.map((value) => ({
		label: value,
		value: value,
	}));

	// Отримуємо enum topIndent з block.json
	const topIndentOptions = metadata.attributes.topIndent.enum.map((value) => ({
		label: value,
		value: value,
	}));

	// Отримуємо enum topRadius з block.json
	const topRadiusOptions = metadata.attributes.topRadius.enum.map((value) => ({
		label: value,
		value: value,
	}));

	// Отримуємо enum backgroundType з block.json
	const backgroundTypeOptions = metadata.attributes.backgroundType.enum.map((value) => ({
		label: value,
		value: value,
	}));

	//Отримати весь перелік постів
	const posts = useSelect((select) => {
		return select('core').getEntityRecords('postType', 'post', {
			per_page: 100,
			_embed: true,
			orderby: 'date',
			order: 'desc',
		});
	}, []);

	const postOptions = (posts || []).map((post) => ({
		value: String(post.id),
		label: post.title?.rendered || `#${post.id}`,
	}));

	const selectedTokens = postsList
		.map((id) => postOptions.find((item) => Number(item.value) === Number(id))?.label)
		.filter(Boolean);

	const suggestions = postOptions.map((item) => item.label);

	const handlePostsChange = (tokens) => {
		const ids = tokens
			.map((tokenLabel) => {
				const found = postOptions.find((item) => item.label === tokenLabel);
				return found ? Number(found.value) : null;
			})
			.filter(Boolean);

		setAttributes({ postsList: ids });
	};

	const selectedPosts = (posts || []).filter((post) =>
		postsList.includes(post.id)
	);


	return (
		<>
			<InspectorControls>
				<PanelBody title={'Settings'}  >
					<TextControl
						label={'z-index блоку'}
						value={ bloсkZindex || ''}
						help={'Чим вижчий номер тим більший пріорітет'}
						type={'number'}
						onChange={ (value)=> setAttributes({ bloсkZindex: value })}
					/>

					<TextControl
						label={'Якір блоку'}
						help={'Це ідентеуфікатор блоку, він має бути унікальним. За його допомогою можна звернутися до блоку в меню тощо'}
						value={ anchorId || ''}
						onChange={ (value)=> setAttributes({ anchorId: value })}
					/>

					<SelectControl
						label={__('Верхній внутрішній відступ')}
						value={topIndent}
						options={topIndentOptions}
						onChange={(value) => setAttributes({ topIndent: value })}
					/>

					<SelectControl
						label={__('Нижній внутрішній відступ')}
						value={bottomIndent}
						options={bottomIndentOptions}
						onChange={(value) => setAttributes({ bottomIndent: value })}
					/>

					<SelectControl
						label={__('Додати верхне скругління?')}
						value={topRadius}
						options={topRadiusOptions}
						onChange={(value) => setAttributes({ topRadius: value })}
					/>

					<SelectControl
						label={__('Обрати колір фону')}
						value={backgroundType}
						options={backgroundTypeOptions}
						onChange={(value) => setAttributes({ backgroundType: value })}
					/>
				</PanelBody>
				<PanelBody title={__('Вибір постів')} initialOpen={true}>
					<SelectControl
						label={__('Оберіть пости')}
						multiple
						value={(postsList || []).map(String)}
						options={postOptions}
						onChange={(values) =>
							setAttributes({
								postsList: (Array.isArray(values) ? values : [values]).map(Number),
							})
						}
					/>
				</PanelBody>
			</InspectorControls>
			<section { ...blockProps } >
				<div className="container">
					<div className="row">
						<RichText
							tagName="h2"
							className={'block-title'}
							value={ attributes.blockTitle }
							placeholder={'Заголовок блоку'}
							onChange={ (value)=>setAttributes({ blockTitle: value })}
							allowedFormats={ [ 'core/text-color' ] }
						/>
					</div>
					<div className="row">
						{selectedPosts.length ? (
							<ul className="selected-posts-preview">
								{selectedPosts.map((post) => (
									<li key={post.id}>
										{post.title?.rendered || `#${post.id}`}
									</li>
								))}
							</ul>
						) : (
							<p>{__('Поки що не вибрано жодного поста')}</p>
						)}
					</div>

				</div>
			</section>
		</>
	);
}

